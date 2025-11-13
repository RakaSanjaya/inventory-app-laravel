@extends('layouts.app')

@section('title', 'Products')

@section('content')
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="mb-8">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                    <div>
                        <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-2">Manajemen Produk</h1>
                        <p class="text-gray-600 text-lg">Kelola dan pantau semua produk dalam inventory Anda</p>
                    </div>

                    @if(auth()->user()->role === 'admin' || auth()->user()->role === 'super_admin')
                        <div class="mt-4 lg:mt-0">
                            <a href="{{ route('products.create') }}"
                                class="inline-flex items-center gap-2 bg-gradient-to-r from-green-600 to-emerald-500 hover:from-green-700 hover:to-emerald-600 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                <span>Tambah Produk Baru</span>
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Alert Messages -->
            @if (session('success'))
                <div
                    class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl flex items-center gap-3">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            @endif

            <!-- Products Table -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-lg overflow-hidden">
                <div class="bg-gradient-to-r from-green-600 to-emerald-500 px-6 py-4">
                    <div class="flex items-center justify-between">
                        <h2 class="text-xl font-bold text-white">Daftar Produk</h2>
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                            </div>
                            <span class="text-white/90 text-sm">Total: {{ $products->count() }} produk</span>
                        </div>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    No</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Nama Produk</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Kategori</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Stok</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Harga</th>
                                @if(auth()->user()->role === 'admin' || auth()->user()->role === 'super_admin')
                                    <th
                                        class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse ($products as $index => $product)
                                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                                    <!-- No -->
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-gray-500">{{ $index + 1 }}</div>
                                                    </td>

                                                    <!-- Name -->
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="flex items-center">
                                                            <div
                                                                class="flex-shrink-0 w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                                                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor"
                                                                    viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4">
                                                                    </path>
                                                                </svg>
                                                            </div>
                                                            <div>
                                                                <a href="{{ route('products.show', $product->id) }}"
                                                                    class="text-sm font-medium text-gray-900 hover:text-green-600 transition-colors duration-200">
                                                                    {{ $product->name }}
                                                                </a>
                                                                <p class="text-xs text-gray-500 mt-1">ID: {{ $product->id }}</p>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <!-- Category -->
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <span
                                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                            {{ $product->category ?? 'Tidak Berkategori' }}
                                                        </span>
                                                    </td>

                                                    <!-- Stock -->
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="flex items-center">
                                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                                                {{ $product->stock == 0 ? 'bg-red-100 text-red-800' :
                                ($product->stock < 10 ? 'bg-yellow-100 text-yellow-800' :
                                    'bg-green-100 text-green-800') }}">
                                                                {{ $product->stock }}
                                                            </span>
                                                            @if($product->stock == 0)
                                                                <span class="ml-2 w-2 h-2 bg-red-500 rounded-full"></span>
                                                            @elseif($product->stock < 10)
                                                                <span class="ml-2 w-2 h-2 bg-yellow-500 rounded-full"></span>
                                                            @else
                                                                <span class="ml-2 w-2 h-2 bg-green-500 rounded-full"></span>
                                                            @endif
                                                        </div>
                                                    </td>

                                                    <!-- Price -->
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            Rp {{ number_format($product->price, 0, ',', '.') }}
                                                        </div>
                                                    </td>

                                                    <!-- Actions -->
                                                    @if(auth()->user()->role === 'admin' || auth()->user()->role === 'super_admin')
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <div class="flex items-center gap-2">
                                                                <!-- Adjust Stock -->
                                                                <a href="{{ route('products.adjustStockForm', $product->id) }}"
                                                                    class="inline-flex items-center gap-1 bg-blue-50 hover:bg-blue-100 text-blue-600 px-3 py-1 rounded-lg text-sm font-medium transition-colors duration-200"
                                                                    title="Adjust Stock">
                                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                                                    </svg>
                                                                    Stok
                                                                </a>

                                                                <!-- Edit -->
                                                                <a href="{{ route('products.edit', $product->id) }}"
                                                                    class="inline-flex items-center gap-1 bg-yellow-50 hover:bg-yellow-100 text-yellow-600 px-3 py-1 rounded-lg text-sm font-medium transition-colors duration-200"
                                                                    title="Edit Produk">
                                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                                        </path>
                                                                    </svg>
                                                                    Edit
                                                                </a>

                                                                <!-- Delete -->
                                                                <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                                                    class="inline-block">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="inline-flex items-center gap-1 bg-red-50 hover:bg-red-100 text-red-600 px-3 py-1 rounded-lg text-sm font-medium transition-colors duration-200"
                                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')"
                                                                        title="Hapus Produk">
                                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                                            </path>
                                                                        </svg>
                                                                        Hapus
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    @endif
                                                </tr>
                            @empty
                                <tr>
                                    <td colspan="{{ auth()->user()->role === 'admin' || auth()->user()->role === 'super_admin' ? '6' : '5' }}"
                                        class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <svg class="w-16 h-16 text-gray-400 mb-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                            </svg>
                                            <p class="text-gray-500 text-lg mb-2">Belum ada produk</p>
                                            <p class="text-gray-400 text-sm">Tambahkan produk pertama Anda untuk memulai</p>
                                            @if(auth()->user()->role === 'admin' || auth()->user()->role === 'super_admin')
                                                <a href="{{ route('products.create') }}"
                                                    class="mt-4 inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition-colors duration-200">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                                    </svg>
                                                    Tambah Produk Pertama
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Additional Info Section -->
            @if($products->count() > 0)
                <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Total Produk</p>
                                <p class="text-lg font-semibold text-gray-900">{{ $products->count() }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center mr-3">
                                <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.35 16.5c-.77.833.192 2.5 1.732 2.5z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Stok Rendah</p>
                                <p class="text-lg font-semibold text-gray-900">
                                    {{ $products->where('stock', '<', 10)->where('stock', '>', 0)->count() }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center mr-3">
                                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Stok Habis</p>
                                <p class="text-lg font-semibold text-gray-900">
                                    {{ $products->where('stock', 0)->count() }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection