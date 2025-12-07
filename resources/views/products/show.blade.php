@extends('layouts.app')

@section('title', 'Product Details')

@section('content')
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="mb-8">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                    <div>
                        <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-2">Detail Produk</h1>
                        <p class="text-gray-600 text-lg">Informasi lengkap tentang produk {{ $product->name }}</p>
                    </div>
                    <div class="mt-4 lg:mt-0">
                        <a href="{{ route('products.index') }}"
                            class="inline-flex items-center gap-2 bg-gray-600 hover:bg-gray-700 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            <span>Kembali ke Daftar Produk</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Product Summary Card -->
                <div class="lg:col-span-1 space-y-6">
                    <!-- Main Product Card -->
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-lg p-6">
                        <div class="text-center mb-6">
                            <div
                                class="w-20 h-20 bg-gradient-to-r from-green-600 to-emerald-500 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                            </div>
                            <h2 class="text-xl font-bold text-gray-900">{{ $product->name }}</h2>
                            <p class="text-gray-500 text-sm mt-1">SKU: {{ $product->sku }}</p>

                            <!-- Stock Status Badge -->
                            <div class="mt-3">
                                @if($product->stock == 0)
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                        <span class="w-2 h-2 bg-red-500 rounded-full mr-2"></span>
                                        Stok Habis
                                    </span>
                                @elseif($product->stock < 10)
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                                        <span class="w-2 h-2 bg-yellow-500 rounded-full mr-2"></span>
                                        Stok Rendah
                                    </span>
                                @else
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                        <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                                        Stok Tersedia
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Quick Stats -->
                        <div class="space-y-4">
                            <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                                <span class="text-gray-600 text-sm">Stok Saat Ini</span>
                                <span class="text-2xl font-bold
                                    {{ $product->stock == 0 ? 'text-red-600' :
        ($product->stock < 10 ? 'text-yellow-600' : 'text-green-600') }}">
                                    {{ $product->stock }}
                                </span>
                            </div>

                            <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                                <span class="text-gray-600 text-sm">Harga</span>
                                <span class="text-lg font-bold text-green-600">Rp
                                    {{ number_format($product->price, 0, ',', '.') }}</span>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        @if(in_array(Auth::user()->role, ['super_admin', 'admin']))
                            <div class="mt-6 pt-6 border-t border-gray-200 space-y-3">
                                <a href="{{ route('products.adjustStockForm', $product->id) }}"
                                    class="w-full inline-flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    Atur Stok
                                </a>

                                <div class="grid grid-cols-2 gap-3">
                                    <a href="{{ route('products.edit', $product->id) }}"
                                        class="inline-flex items-center justify-center gap-2 bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                            </path>
                                        </svg>
                                        Edit
                                    </a>

                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="w-full inline-flex items-center justify-center gap-2 bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Barcode Card -->
                    @if($product->barcode)
                        <div class="bg-white rounded-2xl border border-gray-100 shadow-lg p-6">
                            <div class="text-center">
                                <div class="flex items-center justify-center gap-2 mb-4">
                                    <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z">
                                        </path>
                                    </svg>
                                    <h3 class="text-lg font-bold text-gray-900">Barcode Produk</h3>
                                </div>

                                <!-- Barcode Image -->
                                @if($product->barcode_image)
                                    <div class="bg-white p-4 rounded-lg border-2 border-gray-200 mb-3">
                                        <img src="{{ asset('storage/barcodes/' . $product->barcode_image) }}"
                                            alt="Barcode {{ $product->name }}" class="w-full h-auto max-w-xs mx-auto">
                                    </div>
                                @endif

                                <!-- Barcode Number -->
                                <div class="bg-gray-50 rounded-lg p-3 mb-3">
                                    <p class="text-xs text-gray-500 mb-1">Kode Barcode</p>
                                    <code class="text-sm font-mono font-bold text-gray-800">{{ $product->barcode }}</code>
                                </div>

                                <!-- Print Button -->
                                <button onclick="printBarcode()"
                                    class="w-full inline-flex items-center justify-center gap-2 bg-gray-700 hover:bg-gray-800 text-white font-semibold py-2 px-4 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z">
                                        </path>
                                    </svg>
                                    Cetak Barcode
                                </button>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Product Details Card -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-lg overflow-hidden">
                        <div class="bg-gradient-to-r from-green-600 to-emerald-500 px-6 py-4">
                            <div class="flex items-center justify-between">
                                <h2 class="text-xl font-bold text-white">Informasi Detail Produk</h2>
                                <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="p-6">
                            <div class="space-y-6">
                                <!-- Name -->
                                <div class="flex flex-col sm:flex-row sm:items-start">
                                    <div class="sm:w-1/3 mb-2 sm:mb-0">
                                        <label class="text-sm font-semibold text-gray-700">Nama Produk</label>
                                    </div>
                                    <div class="sm:w-2/3">
                                        <p class="text-gray-900 font-medium">{{ $product->name }}</p>
                                    </div>
                                </div>

                                <!-- Category -->
                                <div class="flex flex-col sm:flex-row sm:items-start">
                                    <div class="sm:w-1/3 mb-2 sm:mb-0">
                                        <label class="text-sm font-semibold text-gray-700">Kategori</label>
                                    </div>
                                    <div class="sm:w-2/3">
                                        @if($product->category)
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                                {{ $product->category }}
                                            </span>
                                        @else
                                            <span class="text-gray-500">Tidak ada kategori</span>
                                        @endif
                                    </div>
                                </div>

                                <!-- SKU -->
                                <div class="flex flex-col sm:flex-row sm:items-start">
                                    <div class="sm:w-1/3 mb-2 sm:mb-0">
                                        <label class="text-sm font-semibold text-gray-700">SKU</label>
                                    </div>
                                    <div class="sm:w-2/3">
                                        <code class="text-sm bg-gray-100 px-2 py-1 rounded text-gray-800 font-mono">
                                            {{ $product->sku }}
                                        </code>
                                    </div>
                                </div>

                                <!-- Barcode -->
                                @if($product->barcode)
                                    <div class="flex flex-col sm:flex-row sm:items-start">
                                        <div class="sm:w-1/3 mb-2 sm:mb-0">
                                            <label class="text-sm font-semibold text-gray-700">Barcode</label>
                                        </div>
                                        <div class="sm:w-2/3">
                                            <code class="text-sm bg-gray-100 px-2 py-1 rounded text-gray-800 font-mono">
                                                {{ $product->barcode }}
                                            </code>
                                        </div>
                                    </div>
                                @endif

                                <!-- Stock -->
                                <div class="flex flex-col sm:flex-row sm:items-start">
                                    <div class="sm:w-1/3 mb-2 sm:mb-0">
                                        <label class="text-sm font-semibold text-gray-700">Stok</label>
                                    </div>
                                    <div class="sm:w-2/3">
                                        <div class="flex items-center gap-3">
                                            <span class="text-xl font-bold
                                                {{ $product->stock == 0 ? 'text-red-600' :
        ($product->stock < 10 ? 'text-yellow-600' : 'text-green-600') }}">
                                                {{ $product->stock }}
                                            </span>
                                            <span class="text-sm text-gray-500">unit</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tambahkan setelah Storage Location section -->

                                <!-- Storage Location -->
                                <div class="flex flex-col sm:flex-row sm:items-start">
                                    <div class="sm:w-1/3 mb-2 sm:mb-0">
                                        <label class="text-sm font-semibold text-gray-700">Lokasi Penyimpanan</label>
                                    </div>
                                    <div class="sm:w-2/3">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                                </path>
                                            </svg>
                                            <span class="text-gray-900">{{ $product->storage_location }}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Supplier - NEW -->
                                <div class="flex flex-col sm:flex-row sm:items-start">
                                    <div class="sm:w-1/3 mb-2 sm:mb-0">
                                        <label class="text-sm font-semibold text-gray-700">Supplier</label>
                                    </div>
                                    <div class="sm:w-2/3">
                                        @if($product->supplier)
                                            <div class="bg-purple-50 rounded-lg p-4 border border-purple-200">
                                                <div class="flex items-start gap-3">
                                                    <div
                                                        class="flex-shrink-0 w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                                                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                    <div class="flex-1">
                                                        <p class="text-sm font-bold text-gray-900">
                                                            {{ $product->supplier->name }}</p>
                                                        @if($product->supplier->phone)
                                                            <div class="flex items-center gap-1 mt-1">
                                                                <svg class="w-3 h-3 text-gray-500" fill="none" stroke="currentColor"
                                                                    viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                                                    </path>
                                                                </svg>
                                                                <span
                                                                    class="text-xs text-gray-600">{{ $product->supplier->phone }}</span>
                                                            </div>
                                                        @endif
                                                        @if($product->supplier->email)
                                                            <div class="flex items-center gap-1 mt-1">
                                                                <svg class="w-3 h-3 text-gray-500" fill="none" stroke="currentColor"
                                                                    viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                                                    </path>
                                                                </svg>
                                                                <span
                                                                    class="text-xs text-gray-600">{{ $product->supplier->email }}</span>
                                                            </div>
                                                        @endif
                                                        @if($product->supplier->address)
                                                            <div class="flex items-start gap-1 mt-1">
                                                                <svg class="w-3 h-3 text-gray-500 mt-0.5 flex-shrink-0" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                                                    </path>
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z">
                                                                    </path>
                                                                </svg>
                                                                <span
                                                                    class="text-xs text-gray-600">{{ $product->supplier->address }}</span>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="flex items-center gap-2 text-gray-500">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636">
                                                    </path>
                                                </svg>
                                                <span class="text-sm">Tidak ada supplier</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- Price -->
                                <div class="flex flex-col sm:flex-row sm:items-start">
                                    <div class="sm:w-1/3 mb-2 sm:mb-0">
                                        <label class="text-sm font-semibold text-gray-700">Harga</label>
                                    </div>
                                    <div class="sm:w-2/3">
                                        <div class="flex items-center gap-2">
                                            <span class="text-xl font-bold text-green-600">Rp
                                                {{ number_format($product->price, 0, ',', '.') }}</span>
                                            <span class="text-sm text-gray-500">IDR</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="flex flex-col sm:flex-row sm:items-start">
                                    <div class="sm:w-1/3 mb-2 sm:mb-0">
                                        <label class="text-sm font-semibold text-gray-700">Deskripsi</label>
                                    </div>
                                    <div class="sm:w-2/3">
                                        @if($product->description)
                                            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                                                <p class="text-gray-700 leading-relaxed">{{ $product->description }}</p>
                                            </div>
                                        @else
                                            <span class="text-gray-500">Tidak ada deskripsi</span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Timestamps -->
                                <div class="pt-6 border-t border-gray-200">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span class="text-gray-600">Dibuat:</span>
                                            <span
                                                class="text-gray-900">{{ $product->created_at->format('d M Y H:i') }}</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span class="text-gray-600">Diupdate:</span>
                                            <span
                                                class="text-gray-900">{{ $product->updated_at->format('d M Y H:i') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function printBarcode() {
            const barcodeImage = document.querySelector('img[alt*="Barcode"]');
            if (!barcodeImage) {
                alert('Barcode tidak ditemukan');
                return;
            }

            const printWindow = window.open('', '_blank');
            printWindow.document.write(`
            <!DOCTYPE html>
            <html>
            <head>
                <title>Print Barcode - {{ $product->name }}</title>
                <style>
                    @media print {
                        @page { margin: 0.5cm; }
                        body { margin: 0; padding: 20px; }
                    }
                    body {
                        font-family: Arial, sans-serif;
                        display: flex;
                        flex-direction: column;
                        align-items: center;
                        justify-content: center;
                        min-height: 100vh;
                    }
                    .barcode-container {
                        text-align: center;
                        padding: 20px;
                        border: 2px solid #000;
                        border-radius: 8px;
                    }
                    .product-name {
                        font-size: 18px;
                        font-weight: bold;
                        margin-bottom: 10px;
                    }
                    .barcode-image {
                        max-width: 300px;
                        height: auto;
                        margin: 20px 0;
                    }
                    .barcode-number {
                        font-family: 'Courier New', monospace;
                        font-size: 14px;
                        font-weight: bold;
                        margin-top: 10px;
                    }
                    .product-info {
                        font-size: 12px;
                        color: #666;
                        margin-top: 10px;
                    }
                </style>
            </head>
            <body>
                <div class="barcode-container">
                    <div class="product-name">{{ $product->name }}</div>
                    <img src="${barcodeImage.src}" alt="Barcode" class="barcode-image">
                    <div class="barcode-number">{{ $product->barcode }}</div>
                    <div class="product-info">
                        SKU: {{ $product->sku }} | Harga: Rp {{ number_format($product->price, 0, ',', '.') }}
                    </div>
                </div>
            </body>
            </html>
        `);

            printWindow.document.close();
            printWindow.onload = function () {
                printWindow.focus();
                printWindow.print();
                printWindow.close();
            };
        }
    </script>
@endsection