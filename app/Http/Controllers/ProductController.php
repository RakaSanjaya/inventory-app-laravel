<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Notification;
use App\Models\StorageLocation;
use App\Models\HistoryActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Milon\Barcode\DNS1D;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('supplier')->get();
        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::with('supplier')->findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function create()
    {
        $categories = Category::all();
        $storageLocations = StorageLocation::all();
        $suppliers = Supplier::all();
        return view('products.create', compact('categories', 'storageLocations', 'suppliers'));
    }

    /**
     * Generate EAN-13 barcode dengan checksum
     */
    private function generateEAN13Barcode($code)
    {
        // Pastikan code hanya 12 digit (digit ke-13 adalah checksum)
        $code = str_pad(substr($code, 0, 12), 12, '0', STR_PAD_LEFT);

        // Hitung checksum digit
        $sum = 0;
        for ($i = 0; $i < 12; $i++) {
            $sum += (int)$code[$i] * (($i % 2 == 0) ? 1 : 3);
        }
        $checksum = (10 - ($sum % 10)) % 10;

        // Gabungkan code dengan checksum
        return $code . $checksum;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'category' => 'required',
            'storage_location' => 'required',
            'supplier_id' => 'nullable|exists:suppliers,id',
            'sku' => 'required|max:100|unique:products,sku',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'barcode' => 'required|string|min:12|max:13|unique:products,barcode',
            'description' => 'nullable',
        ]);

        // Generate EAN-13 dengan checksum otomatis
        $barcodeValue = $this->generateEAN13Barcode($request->barcode);

        // Generate barcode image dengan EAN-13
        $dns1d = new DNS1D();
        $barcodePng = $dns1d->getBarcodePNG($barcodeValue, 'EAN13', 2, 60);
        $barcodeImage = base64_decode($barcodePng);

        // Save barcode image to storage
        $filename = 'barcode_' . $barcodeValue . '.png';
        Storage::disk('public')->put('barcodes/' . $filename, $barcodeImage);

        // Create product with barcode data
        $product = Product::create([
            'name' => $request->name,
            'category' => $request->category,
            'storage_location' => $request->storage_location,
            'supplier_id' => $request->supplier_id,
            'sku' => $request->sku,
            'stock' => $request->stock,
            'price' => $request->price,
            'barcode' => $barcodeValue,
            'barcode_image' => $filename,
            'description' => $request->description,
        ]);

        // Create history activity
        HistoryActivity::create([
            'actor' => Auth::user()->name,
            'name_product' => $product->name,
            'activity_type' => 'added',
            'quantity_change' => $product->stock,
            'description' => 'Product added to inventory with initial stock of ' . $product->stock,
        ]);

        // Check low stock notification
        if ($product->stock < 50) {
            $existingNotification = Notification::where('message', 'Stok produk ' . $product->name . ' kurang dari 50. Segera tambah stok!')->first();

            if (!$existingNotification) {
                session()->flash('warning', 'Stok produk ' . $product->name . ' kurang dari 50. Segera tambah stok!');
                Notification::create([
                    'message' => 'Stok produk ' . $product->name . ' kurang dari 50. Segera tambah stok!',
                ]);
            }
        }

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $storageLocations = StorageLocation::all();
        $suppliers = Supplier::all();
        return view('products.edit', compact('product', 'categories', 'storageLocations', 'suppliers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'category' => 'required',
            'storage_location' => 'required',
            'supplier_id' => 'nullable|exists:suppliers,id',
            'sku' => 'required|max:100|unique:products,sku,' . $id,
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'barcode' => 'required|string|min:12|max:13|unique:products,barcode,' . $id,
            'description' => 'nullable',
        ]);

        $product = Product::findOrFail($id);
        $oldStock = $product->stock;
        $oldBarcode = $product->barcode;
        $nameChanged = $product->name !== $request->name;
        $oldName = $product->name;

        // Check if barcode changed
        if ($oldBarcode !== $request->barcode) {
            // Delete old barcode image
            if ($product->barcode_image) {
                Storage::disk('public')->delete('barcodes/' . $product->barcode_image);
            }

            // Generate EAN-13 dengan checksum otomatis
            $barcodeValue = $this->generateEAN13Barcode($request->barcode);

            // Generate new barcode image dengan EAN-13
            $dns1d = new DNS1D();
            $barcodePng = $dns1d->getBarcodePNG($barcodeValue, 'EAN13', 2, 60);
            $barcodeImage = base64_decode($barcodePng);

            // Save new barcode image
            $filename = 'barcode_' . $barcodeValue . '.png';
            Storage::disk('public')->put('barcodes/' . $filename, $barcodeImage);

            // Update barcode fields
            $product->barcode = $barcodeValue;
            $product->barcode_image = $filename;
        }

        // Update other fields
        $product->name = $request->name;
        $product->category = $request->category;
        $product->storage_location = $request->storage_location;
        $product->supplier_id = $request->supplier_id;
        $product->sku = $request->sku;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();

        // Build activity description
        $quantityChange = $request->stock - $oldStock;
        $activityDescription = "Product updated. ";

        if ($nameChanged) {
            $activityDescription .= "Name changed from '$oldName' to '{$request->name}'. ";
        }
        if ($request->category !== $product->getOriginal('category')) {
            $activityDescription .= "Category changed. ";
        }
        if ($request->storage_location !== $product->getOriginal('storage_location')) {
            $activityDescription .= "Storage location changed. ";
        }
        if ($request->supplier_id != $product->getOriginal('supplier_id')) {
            $activityDescription .= "Supplier changed. ";
        }
        if ($request->sku !== $product->getOriginal('sku')) {
            $activityDescription .= "SKU changed. ";
        }
        if ($oldBarcode !== $request->barcode) {
            $activityDescription .= "Barcode changed. ";
        }
        if ($quantityChange !== 0) {
            $activityDescription .= "Stock changed by $quantityChange units (Old stock: $oldStock, New stock: {$request->stock}). ";
        }
        if ($request->price != $product->getOriginal('price')) {
            $activityDescription .= "Price changed. ";
        }

        // Create history activity
        HistoryActivity::create([
            'actor' => Auth::user()->name,
            'name_product' => $product->name,
            'activity_type' => 'updated',
            'quantity_change' => $quantityChange,
            'description' => $activityDescription,
        ]);

        // Check low stock notification
        if ($product->stock < 50) {
            $existingNotification = Notification::where('message', 'Stok produk ' . $product->name . ' kurang dari 50. Segera tambah stok!')->first();

            if (!$existingNotification) {
                session()->flash('warning', 'Stok produk ' . $product->name . ' kurang dari 50. Segera tambah stok!');
                Notification::create([
                    'message' => 'Stok produk ' . $product->name . ' kurang dari 50. Segera tambah stok!',
                ]);
            }
        }

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Delete barcode image
        if ($product->barcode_image) {
            Storage::disk('public')->delete('barcodes/' . $product->barcode_image);
        }

        // Create history activity
        HistoryActivity::create([
            'actor' => Auth::user()->name,
            'name_product' => $product->name,
            'activity_type' => 'removed',
            'quantity_change' => 0,
            'description' => 'Product removed from inventory',
        ]);

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
    }

    public function adjustStockForm($id)
    {
        $product = Product::findOrFail($id);
        return view('products.adjust_stock', compact('product'));
    }

    public function adjustStock(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
            'type' => 'required|in:stock_in,stock_out',
        ]);

        $product = Product::findOrFail($id);

        if ($request->type === 'stock_out' && $product->stock < $request->quantity) {
            return redirect()->back()->withErrors([
                'quantity' => 'Stok produk tidak mencukupi untuk dikurangi.'
            ]);
        }

        // Add or reduce stock based on type
        $product->stock += $request->type === 'stock_in' ? $request->quantity : -$request->quantity;
        $product->save();

        // Create history activity
        HistoryActivity::create([
            'actor' => Auth::user()->name,
            'name_product' => $product->name,
            'activity_type' => $request->type,
            'quantity_change' => $request->quantity,
            'description' => ($request->type === 'stock_in' ? 'Menambah' : 'Mengurangi') . ' stok produk ' . $product->name . ' sebanyak ' . $request->quantity,
        ]);

        // Check low stock notification
        if ($product->stock < 50) {
            $existingNotification = Notification::where('message', 'Stok produk ' . $product->name . ' kurang dari 50. Segera tambah stok!')->first();

            if (!$existingNotification) {
                session()->flash('warning', 'Stok produk ' . $product->name . ' kurang dari 50. Segera tambah stok!');
                Notification::create([
                    'message' => 'Stok produk ' . $product->name . ' kurang dari 50. Segera tambah stok!',
                ]);
            }
        }

        return redirect()->route('products.index')->with('success', 'Stok produk berhasil diperbarui.');
    }
}
