@extends('layouts.app')

@section('title', 'Detail Order')

@section('content')
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="mb-8">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                    <div>
                        <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-2">Detail Order</h1>
                        <p class="text-gray-600 text-lg">Informasi lengkap transaksi order #{{ $order->order_number }}</p>
                    </div>
                    <div class="mt-4 lg:mt-0 flex gap-3">
                        <button onclick="window.print()"
                            class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg no-print">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z">
                                </path>
                            </svg>
                            <span>Cetak Struk</span>
                        </button>
                        <a href="{{ route('orders.index') }}"
                            class="inline-flex items-center gap-2 bg-gray-600 hover:bg-gray-700 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg no-print">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            <span>Kembali ke Daftar Order</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Alert Messages -->
            @if(session('success'))
                <div
                    class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl flex items-center gap-3">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            @endif

            <!-- Order Summary Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div
                    class="bg-white rounded-2xl p-6 border border-gray-100 shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500">Total Amount</p>
                            <p class="text-2xl font-bold text-gray-900">Rp
                                {{ number_format($order->total_amount, 0, ',', '.') }}</p>
                        </div>
                        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white rounded-2xl p-6 border border-gray-100 shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500">Total Items</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $order->total_items }} Items</p>
                        </div>
                        <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white rounded-2xl p-6 border border-gray-100 shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500">Status</p>
                            <p class="text-2xl font-bold text-gray-900 capitalize">{{ $order->status }}</p>
                        </div>
                        <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white rounded-2xl p-6 border border-gray-100 shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500">Payment Method</p>
                            <p class="text-2xl font-bold text-gray-900 capitalize">{{ $order->payment_method }}</p>
                        </div>
                        <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Order Details -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-lg overflow-hidden mb-6">
                        <div class="bg-gradient-to-r from-green-600 to-emerald-500 px-6 py-4">
                            <div class="flex items-center justify-between">
                                <h2 class="text-xl font-bold text-white flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                        </path>
                                    </svg>
                                    Detail Order
                                </h2>
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <span class="text-white/90 text-sm">#{{ $order->order_number }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="p-6">
                            <!-- Order Information -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Informasi Kasir</label>
                                        <div class="bg-gray-50 rounded-xl p-4">
                                            <p class="font-semibold text-gray-900">{{ $order->cashier_name }}</p>
                                            <p class="text-sm text-gray-600">Kasir</p>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Order</label>
                                        <div class="bg-gray-50 rounded-xl p-4">
                                            <p class="font-semibold text-gray-900">
                                                {{ $order->created_at->format('d M Y, H:i') }}</p>
                                            <p class="text-sm text-gray-600">Waktu Transaksi</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Informasi
                                            Pelanggan</label>
                                        <div class="bg-gray-50 rounded-xl p-4">
                                            <p class="font-semibold text-gray-900">
                                                {{ $order->customer_name ?: 'Tidak ada' }}</p>
                                            <p class="text-sm text-gray-600">Nama Pelanggan</p>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Status Order</label>
                                        <div class="bg-gray-50 rounded-xl p-4">
                                            @if($order->status === 'completed')
                                                <span
                                                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M5 13l4 4L19 7"></path>
                                                    </svg>
                                                    Selesai
                                                </span>
                                            @elseif($order->status === 'cancelled')
                                                <span
                                                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M6 18L18 6M6 6l12 12"></path>
                                                    </svg>
                                                    Dibatalkan
                                                </span>
                                            @else
                                                <span
                                                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    Pending
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Items List -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-3">Items dalam Order</label>
                                <div class="space-y-3">
                                    @foreach($order->items as $item)
                                        <div class="bg-gray-50 rounded-xl p-4">
                                            <div class="flex justify-between items-start mb-2">
                                                <div class="flex-1">
                                                    <h4 class="font-semibold text-gray-900">{{ $item->product_name }}</h4>
                                                    <p class="text-sm text-gray-600">SKU: {{ $item->product_sku }}</p>
                                                </div>
                                                <span class="font-bold text-green-600">Rp
                                                    {{ number_format($item->total, 0, ',', '.') }}</span>
                                            </div>
                                            <div class="flex justify-between items-center text-sm text-gray-600">
                                                <span>Harga Satuan: Rp {{ number_format($item->price, 0, ',', '.') }}</span>
                                                <span>Qty: {{ $item->quantity }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Notes Section -->
                    @if($order->notes)
                        <div class="bg-white rounded-2xl border border-gray-100 shadow-lg overflow-hidden">
                            <div class="bg-gradient-to-r from-blue-600 to-blue-500 px-6 py-4">
                                <h2 class="text-xl font-bold text-white flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                        </path>
                                    </svg>
                                    Catatan Order
                                </h2>
                            </div>
                            <div class="p-6">
                                <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-4">
                                    <p class="text-gray-700">{{ $order->notes }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Payment Summary -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-lg overflow-hidden sticky top-8">
                        <div class="bg-gradient-to-r from-green-600 to-emerald-500 px-6 py-4">
                            <h2 class="text-xl font-bold text-white flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z">
                                    </path>
                                </svg>
                                Ringkasan Pembayaran
                            </h2>
                        </div>
                        <div class="p-6">
                            <div class="space-y-4">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Subtotal:</span>
                                    <span class="font-semibold">Rp {{ number_format($order->subtotal, 0, ',', '.') }}</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Pajak (10%):</span>
                                    <span class="font-semibold">Rp {{ number_format($order->tax, 0, ',', '.') }}</span>
                                </div>
                                @if($order->shipping > 0)
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600">Biaya Pengiriman:</span>
                                        <span class="font-semibold">Rp {{ number_format($order->shipping, 0, ',', '.') }}</span>
                                    </div>
                                @endif
                                @if($order->discount > 0)
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600">Diskon:</span>
                                        <span class="font-semibold text-red-600">- Rp
                                            {{ number_format($order->discount, 0, ',', '.') }}</span>
                                    </div>
                                @endif
                                <div class="flex justify-between items-center border-t border-gray-200 pt-3">
                                    <span class="text-lg font-bold text-gray-900">Total:</span>
                                    <span class="text-xl font-bold text-green-600">Rp
                                        {{ number_format($order->total_amount, 0, ',', '.') }}</span>
                                </div>
                            </div>

                            <div class="mt-6 p-4 bg-gray-50 rounded-xl">
                                <div class="space-y-3">
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600">Metode Pembayaran:</span>
                                        <span class="font-semibold capitalize">{{ $order->payment_method }}</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600">Uang Dibayar:</span>
                                        <span class="font-semibold">Rp
                                            {{ number_format($order->cash_paid, 0, ',', '.') }}</span>
                                    </div>
                                    <div class="flex justify-between items-center border-t border-gray-200 pt-2">
                                        <span class="text-lg font-bold text-gray-900">Kembalian:</span>
                                        <span class="text-xl font-bold text-green-600">Rp
                                            {{ number_format($order->change_amount, 0, ',', '.') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order Timeline -->
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-lg overflow-hidden mt-6">
                        <div class="bg-gradient-to-r from-purple-600 to-purple-500 px-6 py-4">
                            <h2 class="text-xl font-bold text-white flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Timeline Order
                            </h2>
                        </div>
                        <div class="p-6">
                            <div class="space-y-4">
                                <div class="flex items-start gap-3">
                                    <div
                                        class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-900">Order Dibuat</p>
                                        <p class="text-sm text-gray-600">{{ $order->created_at->format('d M Y, H:i') }}</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-3">
                                    <div
                                        class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-900">Pembayaran Berhasil</p>
                                        <p class="text-sm text-gray-600">{{ $order->created_at->format('d M Y, H:i') }}</p>
                                    </div>
                                </div>
                                @if($order->updated_at->gt($order->created_at))
                                    <div class="flex items-start gap-3">
                                        <div
                                            class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                                </path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-900">Terakhir Diupdate</p>
                                            <p class="text-sm text-gray-600">{{ $order->updated_at->format('d M Y, H:i') }}</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Print Section (Hidden by default) -->
    <div class="hidden">
        <style>
            @media print {
                body {
                    margin: 0;
                    padding: 0;
                }

                .no-print {
                    display: none !important;
                }

                @page {
                    size: 80mm auto;
                    margin: 0;
                }
            }

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: 'Courier New', monospace;
                font-size: 12px;
                line-height: 1.5;
                max-width: 80mm;
                margin: 0 auto;
                padding: 10mm;
                background: #f5f5f5;
            }

            .receipt {
                background: white;
                padding: 5mm;
            }

            .header {
                text-align: center;
                margin-bottom: 15px;
                padding-bottom: 10px;
                border-bottom: 2px dashed #000;
            }

            .store-name {
                font-size: 20px;
                font-weight: bold;
                margin-bottom: 5px;
                text-transform: uppercase;
            }

            .store-info {
                font-size: 10px;
                color: #333;
                line-height: 1.6;
            }

            .order-info {
                margin-bottom: 15px;
                padding-bottom: 10px;
                border-bottom: 1px dashed #000;
                font-size: 11px;
            }

            .order-info-row {
                display: flex;
                justify-content: space-between;
                margin-bottom: 4px;
            }

            .items-table {
                margin-bottom: 15px;
                padding-bottom: 10px;
                border-bottom: 1px dashed #000;
            }

            .item-row {
                margin-bottom: 10px;
                font-size: 11px;
            }

            .item-name {
                font-weight: bold;
                margin-bottom: 2px;
            }

            .item-sku {
                color: #666;
                font-size: 9px;
                margin-bottom: 3px;
            }

            .item-details {
                display: flex;
                justify-content: space-between;
            }

            .summary {
                margin-bottom: 15px;
                font-size: 11px;
            }

            .summary-row {
                display: flex;
                justify-content: space-between;
                margin-bottom: 4px;
            }

            .summary-row.total {
                font-weight: bold;
                font-size: 14px;
                padding-top: 8px;
                margin-top: 8px;
                border-top: 2px solid #000;
            }

            .payment-info {
                margin-bottom: 15px;
                padding-bottom: 10px;
                border-bottom: 2px dashed #000;
                font-size: 11px;
            }

            .payment-row {
                display: flex;
                justify-content: space-between;
                margin-bottom: 4px;
            }

            .payment-row.change {
                font-weight: bold;
                font-size: 13px;
                margin-top: 5px;
            }

            .status-badge {
                text-align: center;
                padding: 8px;
                margin: 10px 0;
                border-radius: 5px;
                font-weight: bold;
                font-size: 12px;
            }

            .status-completed {
                background: #DEF7EC;
                color: #03543F;
                border: 1px solid #03543F;
            }

            .status-cancelled {
                background: #FDE8E8;
                color: #9B1C1C;
                border: 1px solid #9B1C1C;
            }

            .notes {
                margin-bottom: 15px;
                padding: 8px;
                background: #FFF9E6;
                border: 1px dashed #D4A700;
                border-radius: 3px;
                font-size: 10px;
            }

            .footer {
                text-align: center;
                font-size: 10px;
                margin-top: 15px;
                line-height: 1.6;
            }

            .divider {
                text-align: center;
                margin: 10px 0;
                font-size: 18px;
                color: #999;
            }
        </style>

        <div class="receipt">
            <!-- Header -->
            <div class="header">
                <div class="store-name">🏪 TOKO ABC</div>
                <div class="store-info">
                    Jl. Contoh No. 123, Jakarta Selatan<br>
                    Telp: 021-1234-5678<br>
                    Email: info@tokoabc.com
                </div>
            </div>

            <!-- Status Badge -->
            @if($order->status === 'completed')
                <div class="status-badge status-completed">✓ LUNAS</div>
            @elseif($order->status === 'cancelled')
                <div class="status-badge status-cancelled">✗ DIBATALKAN</div>
            @endif

            <!-- Order Info -->
            <div class="order-info">
                <div class="order-info-row">
                    <span>No Order:</span>
                    <strong>{{ $order->order_number }}</strong>
                </div>
                <div class="order-info-row">
                    <span>Tanggal:</span>
                    <span>{{ $order->created_at->format('d/m/Y H:i') }}</span>
                </div>
                <div class="order-info-row">
                    <span>Kasir:</span>
                    <span>{{ $order->cashier_name }}</span>
                </div>
                @if($order->customer_name)
                    <div class="order-info-row">
                        <span>Customer:</span>
                        <span>{{ $order->customer_name }}</span>
                    </div>
                @endif
            </div>

            <!-- Items -->
            <div class="items-table">
                @foreach($order->items as $item)
                    <div class="item-row">
                        <div class="item-name">{{ $item->product_name }}</div>
                        <div class="item-sku">SKU: {{ $item->product_sku }}</div>
                        <div class="item-details">
                            <span>{{ $item->quantity }} x Rp {{ number_format($item->price, 0, ',', '.') }}</span>
                            <strong>Rp {{ number_format($item->total, 0, ',', '.') }}</strong>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Summary -->
            <div class="summary">
                <div class="summary-row">
                    <span>Subtotal ({{ $order->total_items }} items):</span>
                    <span>Rp {{ number_format($order->subtotal, 0, ',', '.') }}</span>
                </div>

                <div class="summary-row">
                    <span>Pajak (10%):</span>
                    <span>Rp {{ number_format($order->tax, 0, ',', '.') }}</span>
                </div>

                @if($order->shipping > 0)
                    <div class="summary-row">
                        <span>Ongkir:</span>
                        <span>Rp {{ number_format($order->shipping, 0, ',', '.') }}</span>
                    </div>
                @endif

                @if($order->discount > 0)
                    <div class="summary-row">
                        <span>Diskon:</span>
                        <span>- Rp {{ number_format($order->discount, 0, ',', '.') }}</span>
                    </div>
                @endif

                <div class="summary-row total">
                    <span>TOTAL:</span>
                    <span>Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span>
                </div>
            </div>

            <!-- Payment Info -->
            <div class="payment-info">
                <div class="payment-row">
                    <span>Metode:</span>
                    <strong>{{ strtoupper($order->payment_method) }}</strong>
                </div>
                <div class="payment-row">
                    <span>Uang Dibayar:</span>
                    <span>Rp {{ number_format($order->cash_paid, 0, ',', '.') }}</span>
                </div>
                <div class="payment-row change">
                    <span>Kembalian:</span>
                    <span>Rp {{ number_format($order->change_amount, 0, ',', '.') }}</span>
                </div>
            </div>

            <!-- Notes -->
            @if($order->notes)
                <div class="notes">
                    <strong>📝 Catatan:</strong><br>
                    {{ $order->notes }}
                </div>
            @endif

            <!-- Footer -->
            <div class="divider">• • •</div>
            <div class="footer">
                <p><strong>Terima kasih atas kunjungan Anda!</strong></p>
                <p>Barang yang sudah dibeli tidak dapat dikembalikan</p>
                <p style="margin-top: 8px;">
                    Dicetak: {{ now()->format('d/m/Y H:i:s') }}
                </p>
            </div>
        </div>
    </div>
@endsection
