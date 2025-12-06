<?php
// app/Http/Controllers/OrderController.php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Menampilkan daftar order
     */
    public function index()
    {
        $orders = Order::with('items')
            ->latest()
            ->paginate(10);

        return view('orders.index', compact('orders'));
    }

    /**
     * Menampilkan form kasir dengan daftar produk
     */
    public function create()
    {
        // Ambil semua produk yang stoknya > 0
        $products = Product::where('stock', '>', 0)
            ->orderBy('name')
            ->get();

        // Kategori produk untuk filter
        $categories = Product::select('category')
            ->distinct()
            ->whereNotNull('category')
            ->orderBy('category')
            ->pluck('category');

        return view('orders.create', compact('products', 'categories'));
    }

    /**
     * Menyimpan order baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'cashier_name' => 'required|string|max:255',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'payment_method' => 'required|in:cash,debit,credit,qris,ewallet',
            'cash_paid' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
            'tax' => 'nullable|numeric|min:0',
            'notes' => 'nullable|string'
        ]);

        try {
            DB::beginTransaction();

            // Generate order number
            $orderNumber = 'POS-' . date('Ymd-His') . '-' . rand(1000, 9999);

            // Hitung totals dan validasi stok
            $subtotal = 0;
            $totalItems = 0;
            $orderItems = [];

            foreach ($request->items as $item) {
                $product = Product::find($item['product_id']);

                // Validasi stok
                if ($product->stock < $item['quantity']) {
                    DB::rollBack();
                    return redirect()
                        ->back()
                        ->with('error', "Stok {$product->name} tidak mencukupi! Stok tersedia: {$product->stock}")
                        ->withInput();
                }

                $itemTotal = $product->price * $item['quantity'];
                $subtotal += $itemTotal;
                $totalItems += $item['quantity'];

                $orderItems[] = [
                    'product' => $product,
                    'quantity' => $item['quantity'],
                    'price' => $product->price,
                    'total' => $itemTotal
                ];
            }

            $tax = $request->tax ?? 0;
            $discount = $request->discount ?? 0;
            $totalAmount = $subtotal + $tax - $discount;
            $changeAmount = $request->cash_paid - $totalAmount;

            // Validasi pembayaran
            if ($changeAmount < 0) {
                DB::rollBack();
                return redirect()
                    ->back()
                    ->with('error', 'Uang yang dibayarkan kurang dari total pembayaran!')
                    ->withInput();
            }

            // Buat order
            $order = Order::create([
                'order_number' => $orderNumber,
                'cashier_name' => $request->cashier_name,
                'total_items' => $totalItems,
                'subtotal' => $subtotal,
                'tax' => $tax,
                'discount' => $discount,
                'total_amount' => $totalAmount,
                'payment_method' => $request->payment_method,
                'cash_paid' => $request->cash_paid,
                'change_amount' => $changeAmount,
                'status' => 'completed',
                'notes' => $request->notes,
                'completed_at' => now()
            ]);

            // Buat order items dan kurangi stok
            foreach ($orderItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_name' => $item['product']->name,
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                    'total' => $item['total']
                ]);

                // Kurangi stok produk
                $item['product']->decrement('stock', $item['quantity']);
            }

            DB::commit();

            return redirect()
                ->route('orders.show', $order->id)
                ->with('success', 'Order berhasil dibuat!');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()
                ->back()
                ->with('error', 'Gagal membuat order: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Menampilkan detail order
     */
    public function show(Order $order)
    {
        $order->load('items');

        return view('orders.show', compact('order'));
    }

    /**
     * Menampilkan form edit order
     */
    public function edit(Order $order)
    {
        if ($order->status === 'completed') {
            return redirect()
                ->route('orders.show', $order->id)
                ->with('error', 'Order yang sudah completed tidak dapat diedit');
        }

        $order->load('items');
        $products = Product::where('stock', '>', 0)->orderBy('name')->get();

        return view('orders.edit', compact('order', 'products'));
    }

    /**
     * Membatalkan order
     */
    public function cancel(Order $order)
    {
        try {
            DB::beginTransaction();

            // Kembalikan stok produk
            foreach ($order->items as $item) {
                $product = Product::where('name', $item->product_name)->first();
                if ($product) {
                    $product->increment('stock', $item->quantity);
                }
            }

            $order->update(['status' => 'cancelled']);

            DB::commit();

            return redirect()
                ->route('orders.index')
                ->with('success', 'Order berhasil dibatalkan dan stok dikembalikan!');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()
                ->back()
                ->with('error', 'Gagal membatalkan order: ' . $e->getMessage());
        }
    }

    /**
     * Menghapus order
     */
    public function destroy(Order $order)
    {
        try {
            $order->delete();

            return redirect()
                ->route('orders.index')
                ->with('success', 'Order berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Gagal menghapus order: ' . $e->getMessage());
        }
    }

    /**
     * Cetak receipt
     */
    public function print(Order $order)
    {
        $order->load('items');

        return view('orders.receipt', compact('order'));
    }

    /**
     * API untuk search produk (AJAX)
     */
    public function searchProducts(Request $request)
    {
        $search = $request->get('search', '');
        $category = $request->get('category', '');  

        $products = Product::where('stock', '>', 0)
            ->when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('sku', 'like', "%{$search}%");
                });
            })
            ->when($category, function ($query, $category) {
                return $query->where('category', $category);
            })
            ->orderBy('name')
            ->get();

        return response()->json($products);
    }
}
