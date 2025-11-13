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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        <span>Kembali ke Daftar Produk</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Product Summary Card -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl border border-gray-100 shadow-lg p-6">
                    <div class="text-center mb-6">
                        <div class="w-20 h-20 bg-gradient-to-r from-green-600 to-emerald-500 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold text-gray-900">{{ $product->name }}</h2>
                        <p class="text-gray-500 text-sm mt-1">SKU: {{ $product->sku }}</p>

                        <!-- Stock Status Badge -->
                        <div class="mt-3">
                            @if($product->stock == 0)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                <span class="w-2 h-2 bg-red-500 rounded-full mr-2"></span>
                                Stok Habis
                            </span>
                            @elseif($product->stock < 10)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                                <span class="w-2 h-2 bg-yellow-500 rounded-full mr-2"></span>
                                Stok Rendah
                            </span>
                            @else
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
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
                            <span class="text-lg font-bold text-green-600">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    @if(in_array(Auth::user()->role, ['super_admin', 'admin']))
                    <div class="mt-6 pt-6 border-t border-gray-200 space-y-3">
                        <a href="{{ route('products.adjustStockForm', $product->id) }}"
                           class="w-full inline-flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Atur Stok
                        </a>

                        <div class="grid grid-cols-2 gap-3">
                            <a href="{{ route('products.edit', $product->id) }}"
                               class="inline-flex items-center justify-center gap-2 bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                Edit
                            </a>

                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="w-full inline-flex items-center justify-center gap-2 bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Product Details Card -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl border border-gray-100 shadow-lg overflow-hidden">
                    <div class="bg-gradient-to-r from-green-600 to-emerald-500 px-6 py-4">
                        <div class="flex items-center justify-between">
                            <h2 class="text-xl font-bold text-white">Informasi Detail Produk</h2>
                            <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
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
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
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

                            <!-- Storage Location -->
                            <div class="flex flex-col sm:flex-row sm:items-start">
                                <div class="sm:w-1/3 mb-2 sm:mb-0">
                                    <label class="text-sm font-semibold text-gray-700">Lokasi Penyimpanan</label>
                                </div>
                                <div class="sm:w-2/3">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                        </svg>
                                        <span class="text-gray-900">{{ $product->storage_location }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Price -->
                            <div class="flex flex-col sm:flex-row sm:items-start">
                                <div class="sm:w-1/3 mb-2 sm:mb-0">
                                    <label class="text-sm font-semibold text-gray-700">Harga</label>
                                </div>
                                <div class="sm:w-2/3">
                                    <div class="flex items-center gap-2">
                                        <span class="text-xl font-bold text-green-600">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
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
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="text-gray-600">Dibuat:</span>
                                        <span class="text-gray-900">{{ $product->created_at->format('d M Y H:i') }}</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="text-gray-600">Diupdate:</span>
                                        <span class="text-gray-900">{{ $product->updated_at->format('d M Y H:i') }}</span>
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
@endsection
