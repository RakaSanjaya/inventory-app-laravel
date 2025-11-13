@extends('layouts.app')

@section('title', 'Mengatur Stok Produk')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-2">Atur Stok Produk</h1>
                    <p class="text-gray-600 text-lg">Kelola jumlah stok untuk produk <span class="font-semibold text-green-600">{{ $product->name }}</span></p>
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
            <!-- Product Info Card -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl border border-gray-100 shadow-lg p-6">
                    <div class="text-center mb-6">
                        <div class="w-16 h-16 bg-gradient-to-r from-green-600 to-emerald-500 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900">{{ $product->name }}</h3>
                        <p class="text-gray-500 text-sm mt-1">SKU: {{ $product->sku }}</p>
                    </div>

                    <div class="space-y-4">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Kategori</span>
                            <span class="font-semibold text-gray-900">{{ $product->category ?? '-' }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Lokasi</span>
                            <span class="font-semibold text-gray-900">{{ $product->storage_location ?? '-' }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Harga</span>
                            <span class="font-semibold text-green-600">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                        </div>
                    </div>

                    <div class="mt-6 pt-6 border-t border-gray-200">
                        <div class="text-center">
                            <p class="text-sm text-gray-500 mb-2">Stok Saat Ini</p>
                            <div class="text-3xl font-bold
                                {{ $product->stock == 0 ? 'text-red-600' :
                                   ($product->stock < 10 ? 'text-yellow-600' : 'text-green-600') }}">
                                {{ $product->stock }}
                            </div>
                            <p class="text-xs text-gray-500 mt-2">
                                @if($product->stock == 0)
                                <span class="text-red-500">● Stok Habis</span>
                                @elseif($product->stock < 10)
                                <span class="text-yellow-500">● Stok Rendah</span>
                                @else
                                <span class="text-green-500">● Stok Aman</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Adjust Stock Form -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl border border-gray-100 shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="bg-gradient-to-r from-green-600 to-emerald-500 px-6 py-4 rounded-t-2xl">
                        <div class="flex items-center justify-between">
                            <h2 class="text-xl font-bold text-white">Formulir Penyesuaian Stok</h2>
                            <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('products.adjustStock', $product->id) }}" method="POST" class="p-6 space-y-6">
                        @csrf

                        <!-- Action Type -->
                        <div class="space-y-2">
                            <label for="type" class="block text-sm font-semibold text-gray-700">
                                Tipe Penyesuaian <span class="text-red-500">*</span>
                            </label>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <label class="relative cursor-pointer">
                                    <input type="radio" name="type" value="stock_in" class="sr-only peer" checked>
                                    <div class="p-4 border-2 border-gray-200 rounded-xl peer-checked:border-green-500 peer-checked:bg-green-50 transition-all duration-200 hover:border-green-300">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <div class="font-semibold text-gray-900">Tambah Stok</div>
                                                <div class="text-sm text-gray-500">Menambah jumlah stok produk</div>
                                            </div>
                                        </div>
                                    </div>
                                </label>

                                <label class="relative cursor-pointer">
                                    <input type="radio" name="type" value="stock_out" class="sr-only peer">
                                    <div class="p-4 border-2 border-gray-200 rounded-xl peer-checked:border-red-500 peer-checked:bg-red-50 transition-all duration-200 hover:border-red-300">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                                                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <div class="font-semibold text-gray-900">Kurangi Stok</div>
                                                <div class="text-sm text-gray-500">Mengurangi jumlah stok produk</div>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            @error('type')
                            <p class="text-red-500 text-sm mt-1 flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <!-- Quantity Input -->
                        <div class="space-y-2">
                            <label for="quantity" class="block text-sm font-semibold text-gray-700">
                                Jumlah Stok <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <input
                                    type="number"
                                    name="quantity"
                                    id="quantity"
                                    placeholder="Masukkan jumlah stok"
                                    class="w-full border border-gray-300 rounded-xl py-3 px-4 pl-12 focus:border-green-600 focus:ring-2 focus:ring-green-200 transition duration-300 ease-in-out outline-none"
                                    min="1"
                                    required>
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                    </svg>
                                </div>
                            </div>
                            @error('quantity')
                            <p class="text-red-500 text-sm mt-1 flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <!-- Preview Section -->
                        <div id="preview-section" class="bg-gray-50 rounded-xl p-4 border border-gray-200 hidden">
                            <h4 class="font-semibold text-gray-900 mb-3">Preview Perubahan</h4>
                            <div class="grid grid-cols-2 gap-4 text-sm">
                                <div>
                                    <span class="text-gray-600">Stok Saat Ini:</span>
                                    <div class="font-semibold text-gray-900">{{ $product->stock }}</div>
                                </div>
                                <div>
                                    <span class="text-gray-600">Stok Setelah:</span>
                                    <div id="new-stock" class="font-semibold text-green-600">-</div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200">
                            <button type="submit"
                                    class="inline-flex items-center justify-center gap-2 bg-gradient-to-r from-green-600 to-emerald-500 hover:from-green-700 hover:to-emerald-600 text-white font-semibold py-3 px-8 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl flex-1">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Simpan Perubahan Stok</span>
                            </button>

                            <a href="{{ route('products.index') }}"
                               class="inline-flex items-center justify-center gap-2 bg-gray-600 hover:bg-gray-700 text-white font-semibold py-3 px-8 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg text-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                <span>Batal</span>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const quantityInput = document.getElementById('quantity');
    const typeRadios = document.querySelectorAll('input[name="type"]');
    const previewSection = document.getElementById('preview-section');
    const newStockElement = document.getElementById('new-stock');
    const currentStock = {{ $product->stock }};

    function updatePreview() {
        const quantity = parseInt(quantityInput.value) || 0;
        const type = document.querySelector('input[name="type"]:checked').value;

        if (quantity > 0) {
            let newStock;
            if (type === 'stock_in') {
                newStock = currentStock + quantity;
                newStockElement.className = 'font-semibold text-green-600';
            } else {
                newStock = currentStock - quantity;
                newStockElement.className = newStock < 0 ? 'font-semibold text-red-600' : 'font-semibold text-green-600';
            }

            newStockElement.textContent = newStock;
            previewSection.classList.remove('hidden');
        } else {
            previewSection.classList.add('hidden');
        }
    }

    quantityInput.addEventListener('input', updatePreview);
    typeRadios.forEach(radio => {
        radio.addEventListener('change', updatePreview);
    });
});
</script>
@endsection
