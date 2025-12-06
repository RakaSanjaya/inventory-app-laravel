@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="min-h-screen">
        <div class="mcontainer mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="mb-8">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                    <div>
                        <h1 class="text-2xl font-semibold text-gray-900 mb-1">Dashboard Overview</h1>
                        <p class="text-gray-600 text-sm">Selamat datang kembali, berikut ringkasan inventory Anda</p>
                    </div>
                    <div class="mt-4 lg:mt-0">
                        <div class="flex items-center gap-3 bg-white rounded-xl p-3 shadow-sm border border-gray-100">
                            <div
                                class="w-10 h-10 bg-gradient-to-r from-green-600 to-emerald-500 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500">Login sebagai</p>
                                <p class="font-medium text-gray-900 text-sm">{{ Auth::user()->name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Date Filter Section -->
            <div class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm mb-6">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-3">
                    <h3 class="text-base font-medium text-gray-900">Filter Data Order</h3>
                    <div class="flex flex-col sm:flex-row gap-3">
                        <form method="GET" action="{{ route('dashboard') }}" class="flex flex-col sm:flex-row gap-3">
                            <div class="flex items-center gap-2">
                                <label class="text-xs font-medium text-gray-700">Dari:</label>
                                <input type="date" name="start_date" value="{{ $chartData['startDate'] }}"
                                    class="text-sm rounded-lg border border-gray-300 px-3 py-1.5 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                            </div>
                            <div class="flex items-center gap-2">
                                <label class="text-xs font-medium text-gray-700">Sampai:</label>
                                <input type="date" name="end_date" value="{{ $chartData['endDate'] }}"
                                    class="text-sm rounded-lg border border-gray-300 px-3 py-1.5 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                            </div>
                            <div class="flex gap-2">
                                <button type="submit"
                                    class="bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-1.5 rounded-lg font-medium text-sm transition-colors duration-200">
                                    Filter
                                </button>
                                <a href="{{ route('dashboard') }}"
                                    class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-1.5 rounded-lg font-medium text-sm transition-colors duration-200 text-center">
                                    Reset
                                </a>
                            </div>
                        </form>

                        <!-- Export Buttons -->
                        <div class="flex gap-2 border-l border-gray-300 pl-3">
                            <a href="{{ route('dashboard.export.excel', request()->query()) }}"
                                class="bg-green-600 hover:bg-green-700 text-white px-4 py-1.5 rounded-lg font-medium text-sm transition-colors duration-200 inline-flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                                Export Excel
                            </a>
                            <a href="{{ route('dashboard.export.pdf', request()->query()) }}"
                                class="bg-red-600 hover:bg-red-700 text-white px-4 py-1.5 rounded-lg font-medium text-sm transition-colors duration-200 inline-flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                                Export PDF
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Today's Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                <!-- Today's Orders -->
                <div
                    class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 group">
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="text-sm font-medium text-gray-700">Order Hari Ini</h3>
                        <div
                            class="w-10 h-10 bg-emerald-50 rounded-lg flex items-center justify-center group-hover:scale-105 transition-transform duration-300">
                            <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <p class="text-2xl font-bold text-gray-900 mb-1">{{ $chartData['todayStats']['orders'] }}</p>
                    <p class="text-xs text-gray-500">Total order hari ini</p>
                </div>

                <!-- Today's Revenue -->
                <div
                    class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 group">
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="text-sm font-medium text-gray-700">Pendapatan Hari Ini</h3>
                        <div
                            class="w-10 h-10 bg-emerald-50 rounded-lg flex items-center justify-center group-hover:scale-105 transition-transform duration-300">
                            <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <p class="text-2xl font-bold text-gray-900 mb-1">Rp
                        {{ number_format($chartData['todayStats']['revenue'], 0, ',', '.') }}
                    </p>
                    <p class="text-xs text-gray-500">Total pendapatan hari ini</p>
                </div>

                <!-- Completed Orders Today -->
                <div
                    class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 group">
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="text-sm font-medium text-gray-700">Selesai Hari Ini</h3>
                        <div
                            class="w-10 h-10 bg-emerald-50 rounded-lg flex items-center justify-center group-hover:scale-105 transition-transform duration-300">
                            <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <p class="text-2xl font-bold text-gray-900 mb-1">{{ $chartData['todayStats']['completed'] }}</p>
                    <p class="text-xs text-gray-500">Order selesai hari ini</p>
                </div>

                <!-- Average Order Value -->
                <div
                    class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 group">
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="text-sm font-medium text-gray-700">Rata-rata Order</h3>
                        <div
                            class="w-10 h-10 bg-emerald-50 rounded-lg flex items-center justify-center group-hover:scale-105 transition-transform duration-300">
                            <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <p class="text-2xl font-bold text-gray-900 mb-1">Rp
                        {{ number_format($chartData['todayStats']['average_order'], 0, ',', '.') }}
                    </p>
                    <p class="text-xs text-gray-500">Rata-rata nilai order</p>
                </div>
            </div>

            <!-- Weekly Performance Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                <!-- Total Weekly Revenue -->
                <div
                    class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 group">
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="text-sm font-medium text-gray-700">Pendapatan Minggu Ini</h3>
                        <div
                            class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center group-hover:scale-105 transition-transform duration-300">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <p class="text-2xl font-bold text-gray-900 mb-1">Rp
                        {{ number_format($chartData['weeklyStats']['total_revenue'], 0, ',', '.') }}
                    </p>
                    <p class="text-xs text-gray-500">7 hari terakhir</p>
                </div>

                <!-- Total Weekly Orders -->
                <div
                    class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 group">
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="text-sm font-medium text-gray-700">Order Minggu Ini</h3>
                        <div
                            class="w-10 h-10 bg-purple-50 rounded-lg flex items-center justify-center group-hover:scale-105 transition-transform duration-300">
                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <p class="text-2xl font-bold text-gray-900 mb-1">{{ $chartData['weeklyStats']['total_orders'] }}</p>
                    <p class="text-xs text-gray-500">Total order 7 hari</p>
                </div>

                <!-- Average Daily Revenue -->
                <div
                    class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 group">
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="text-sm font-medium text-gray-700">Rata-rata Harian</h3>
                        <div
                            class="w-10 h-10 bg-green-50 rounded-lg flex items-center justify-center group-hover:scale-105 transition-transform duration-300">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                        </div>
                    </div>
                    <p class="text-2xl font-bold text-gray-900 mb-1">Rp
                        {{ number_format($chartData['weeklyStats']['average_daily_revenue'], 0, ',', '.') }}
                    </p>
                    <p class="text-xs text-gray-500">Pendapatan per hari</p>
                </div>

                <!-- Best Day -->
                <div
                    class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 group">
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="text-sm font-medium text-gray-700">Hari Terbaik</h3>
                        <div
                            class="w-10 h-10 bg-orange-50 rounded-lg flex items-center justify-center group-hover:scale-105 transition-transform duration-300">
                            <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <p class="text-lg font-bold text-gray-900 mb-1">
                        {{ $chartData['weeklyStats']['best_day'] ? \Carbon\Carbon::parse($chartData['weeklyStats']['best_day']->date)->isoFormat('dddd') : 'N/A' }}
                    </p>
                    <p class="text-xs text-gray-500">
                        Rp
                        {{ $chartData['weeklyStats']['best_day'] ? number_format($chartData['weeklyStats']['best_day']->revenue, 0, ',', '.') : '0' }}
                    </p>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 mb-6">
                <!-- NEW CHART: Weekly Revenue Trend -->
                <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
                    <div class="bg-gradient-to-r from-green-600 to-emerald-500 px-4 py-3">
                        <div class="flex items-center justify-between">
                            <h2 class="text-base font-semibold text-white">Trend Pendapatan 7 Hari Terakhir</h2>
                            <div class="w-7 h-7 bg-white/20 rounded flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="p-4" style="height: 300px;">
                        <canvas id="weeklyRevenueChart"></canvas>
                    </div>
                </div>

                <!-- Chart 1: Daily Orders & Revenue -->
                <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
                    <div class="bg-gradient-to-r from-green-600 to-emerald-500 px-4 py-3">
                        <div class="flex items-center justify-between">
                            <h2 class="text-base font-semibold text-white">Order & Pendapatan Harian</h2>
                            <div class="w-7 h-7 bg-white/20 rounded flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="p-4" style="height: 300px;">
                        <canvas id="dailyOrdersChart"></canvas>
                    </div>
                </div>

                <!-- Chart 2: Order Status Distribution -->
                <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
                    <div class="bg-gradient-to-r from-green-600 to-emerald-500 px-4 py-3">
                        <div class="flex items-center justify-between">
                            <h2 class="text-base font-semibold text-white">Distribusi Status Order</h2>
                            <div class="w-7 h-7 bg-white/20 rounded flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="p-4" style="height: 300px;">
                        <canvas id="orderStatusChart"></canvas>
                    </div>
                </div>

                <!-- Chart 3: Payment Methods -->
                <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
                    <div class="bg-gradient-to-r from-green-600 to-emerald-500 px-4 py-3">
                        <div class="flex items-center justify-between">
                            <h2 class="text-base font-semibold text-white">Metode Pembayaran</h2>
                            <div class="w-7 h-7 bg-white/20 rounded flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="p-4" style="height: 300px;">
                        <canvas id="paymentMethodChart"></canvas>
                    </div>
                </div>

                <!-- Chart 4: Top Selling Products -->
                <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
                    <div class="bg-gradient-to-r from-green-600 to-emerald-500 px-4 py-3">
                        <div class="flex items-center justify-between">
                            <h2 class="text-base font-semibold text-white">Produk Terlaris</h2>
                            <div class="w-7 h-7 bg-white/20 rounded flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="p-4" style="height: 300px;">
                        <canvas id="topProductsChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Inventory Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <!-- Total Products Card -->
                <div
                    class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 group">
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="text-sm font-medium text-gray-700">Total Produk</h3>
                        <div
                            class="w-10 h-10 bg-emerald-50 rounded-lg flex items-center justify-center group-hover:scale-105 transition-transform duration-300">
                            <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                    </div>
                    <p class="text-2xl font-bold text-gray-900 mb-1">{{ $totalProducts }}</p>
                    <p class="text-xs text-gray-500">Produk aktif dalam sistem</p>
                </div>

                <!-- Low Stock Products Card -->
                <div
                    class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 group">
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="text-sm font-medium text-gray-700">Stok Rendah</h3>
                        <div
                            class="w-10 h-10 bg-amber-50 rounded-lg flex items-center justify-center group-hover:scale-105 transition-transform duration-300">
                            <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.35 16.5c-.77.833.192 2.5 1.732 2.5z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <p class="text-2xl font-bold text-gray-900 mb-1">{{ $lowStockProducts }}</p>
                    <p class="text-xs text-gray-500">Perlu perhatian segera</p>
                </div>

                <!-- Out of Stock Products Card -->
                <div
                    class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 group">
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="text-sm font-medium text-gray-700">Stok Habis</h3>
                        <div
                            class="w-10 h-10 bg-red-50 rounded-lg flex items-center justify-center group-hover:scale-105 transition-transform duration-300">
                            <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <p class="text-2xl font-bold text-gray-900 mb-1">{{ $outOfStockProducts }}</p>
                    <p class="text-xs text-gray-500">Perlu restock segera</p>
                </div>
            </div>

            <!-- Recent Data Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 mb-6">
                <!-- Recent Products Table -->
                <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
                    <div class="bg-gradient-to-r from-green-600 to-emerald-500 px-4 py-3">
                        <div class="flex items-center justify-between">
                            <h2 class="text-base font-semibold text-white">Produk Terbaru</h2>
                            <div class="w-7 h-7 bg-white/20 rounded flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                        Nama Produk</th>
                                    <th
                                        class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                        Kategori</th>
                                    <th
                                        class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                        Lokasi</th>
                                    <th
                                        class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                        Stok</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse ($recentProducts as $product)
                                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                                        <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $product->name }}
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <span
                                                class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-emerald-100 text-emerald-800">
                                                {{ $product->category }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                            {{ $product->storage_location }}
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                                                                    {{ $product->stock <= 0 ? 'bg-red-100 text-red-800' : ($product->stock <= 10 ? 'bg-amber-100 text-amber-800' : 'bg-emerald-100 text-emerald-800') }}">
                                                {{ $product->stock }}
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-4 py-6 text-center text-gray-500">
                                            <div class="flex flex-col items-center">
                                                <svg class="w-10 h-10 text-gray-400 mb-2" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4">
                                                    </path>
                                                </svg>
                                                <p class="text-sm">Tidak ada data produk terbaru</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Recent Activities Table -->
                <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
                    <div class="bg-gradient-to-r from-green-600 to-emerald-500 px-4 py-3">
                        <div class="flex items-center justify-between">
                            <h2 class="text-base font-semibold text-white">Riwayat Aktivitas</h2>
                            <div class="w-7 h-7 bg-white/20 rounded flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                        Produk</th>
                                    <th
                                        class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                        Aktivitas</th>
                                    <th
                                        class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                        Waktu</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse ($recentActivities as $activity)
                                                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                                                            <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900">
                                                                {{ $activity->name_product }}
                                                            </td>
                                                            <td class="px-4 py-3 whitespace-nowrap">
                                                                <span
                                                                    class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium
                                                                                                                                                                                        {{ $activity->activity_type === 'created' ? 'bg-blue-100 text-blue-800' :
                                    ($activity->activity_type === 'updated' ? 'bg-amber-100 text-amber-800' : 'bg-emerald-100 text-emerald-800') }}">
                                                                    {{ $activity->activity_type }}
                                                                </span>
                                                            </td>
                                                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                                                {{ $activity->created_at->diffForHumans() }}
                                                            </td>
                                                        </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-4 py-6 text-center text-gray-500">
                                            <div class="flex flex-col items-center">
                                                <svg class="w-10 h-10 text-gray-400 mb-2" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <p class="text-sm">Tidak ada riwayat aktivitas</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Notifications Section -->
            <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
                <div class="bg-gradient-to-r from-green-600 to-emerald-500 px-4 py-3">
                    <div class="flex items-center justify-between">
                        <h2 class="text-base font-semibold text-white">Notifikasi</h2>
                        <div class="flex items-center gap-2">
                            <div class="w-7 h-7 bg-white/20 rounded flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                    </path>
                                </svg>
                            </div>
                            @if($notifications->where('is_read', false)->count() > 0)
                                <span class="bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full">
                                    {{ $notifications->where('is_read', false)->count() }} baru
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="divide-y divide-gray-200">
                    @forelse ($notifications as $notification)
                        <div
                            class="p-4 hover:bg-gray-50 transition-colors duration-200 {{ !$notification->is_read ? 'bg-blue-50 border-l-4 border-blue-500' : '' }}">
                            <div class="flex items-start justify-between">
                                <div class="flex-1">
                                    <div class="flex items-center gap-2 mb-1">
                                        @if(!$notification->is_read)
                                            <span class="w-2 h-2 bg-blue-500 rounded-full"></span>
                                        @endif
                                        <p
                                            class="text-sm font-medium text-gray-900 {{ !$notification->is_read ? 'text-blue-900' : '' }}">
                                            {{ $notification->message }}
                                        </p>
                                    </div>
                                    <p class="text-xs text-gray-500">{{ $notification->created_at->diffForHumans() }}</p>
                                </div>
                                <div class="flex items-center gap-2 ml-3">
                                    @if (!$notification->is_read)
                                        <a href="{{ route('notifications.markAsRead', $notification->id) }}"
                                            class="inline-flex items-center gap-1 bg-emerald-600 hover:bg-emerald-700 text-white px-3 py-1.5 rounded text-xs font-medium transition-colors duration-200">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            Tandai Dibaca
                                        </a>
                                    @else
                                        <span
                                            class="inline-flex items-center gap-1 bg-gray-200 text-gray-600 px-3 py-1.5 rounded text-xs font-medium">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            Sudah Dibaca
                                        </span>
                                    @endif
                                    <a href="{{ route('notifications.delete', $notification->id) }}"
                                        class="inline-flex items-center justify-center w-8 h-8 bg-red-100 hover:bg-red-200 text-red-600 rounded transition-colors duration-200"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus notifikasi ini?')">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                            </path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="p-6 text-center text-gray-500">
                            <svg class="w-12 h-12 text-gray-400 mx-auto mb-3" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                </path>
                            </svg>
                            <p class="text-sm">Tidak ada notifikasi</p>
                            <p class="text-xs mt-1">Semua notifikasi akan muncul di sini</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            console.log('Initializing charts...');

            // Chart colors
            const colors = {
                emerald: {
                    500: '#10B981',
                    600: '#059669',
                    700: '#047857'
                },
                blue: {
                    500: '#3B82F6',
                    600: '#2563EB'
                },
                purple: {
                    500: '#8B5CF6'
                },
                orange: {
                    500: '#F97316'
                },
                warning: '#D97706',
                danger: '#DC2626',
                info: '#8B5CF6',
                secondary: '#6B7280'
            };

            // Function to initialize chart with error handling
            function initChart(canvasId, config) {
                const canvas = document.getElementById(canvasId);
                if (!canvas) {
                    console.error('Canvas not found:', canvasId);
                    return null;
                }

                try {
                    return new Chart(canvas, config);
                } catch (error) {
                    console.error('Error initializing chart', canvasId, error);
                    return null;
                }
            }

            // Format number function
            function formatNumber(num) {
                return new Intl.NumberFormat('id-ID').format(num);
            }

            // NEW CHART: Weekly Revenue Trend
            const weeklyRevenueChart = initChart('weeklyRevenueChart', {
                type: 'line',
                data: {
                    labels: {!! json_encode($chartData['weeklyRevenueData']->pluck('date')->map(function ($date) {
        return \Carbon\Carbon::parse($date)->isoFormat('DD MMM');
    })) !!},
                    datasets: [
                        {
                            label: 'Pendapatan (Rp)',
                            data: {!! json_encode($chartData['weeklyRevenueData']->pluck('revenue')) !!},
                            borderColor: colors.emerald[600],
                            backgroundColor: 'rgba(16, 185, 129, 0.1)',
                            borderWidth: 3,
                            tension: 0.4,
                            fill: true,
                            pointBackgroundColor: colors.emerald[600],
                            pointBorderColor: '#fff',
                            pointBorderWidth: 2,
                            pointRadius: 5,
                            pointHoverRadius: 7
                        },
                        {
                            label: 'Jumlah Order',
                            data: {!! json_encode($chartData['weeklyRevenueData']->pluck('order_count')) !!},
                            borderColor: colors.info,
                            backgroundColor: 'transparent',
                            borderWidth: 2,
                            tension: 0.4,
                            borderDash: [5, 5],
                            pointBackgroundColor: colors.info,
                            pointBorderColor: '#fff',
                            pointBorderWidth: 2,
                            pointRadius: 4,
                            yAxisID: 'y1'
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    interaction: { mode: 'index', intersect: false },
                    scales: {
                        x: {
                            grid: { display: false },
                            ticks: {
                                maxRotation: 0
                            }
                        },
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Pendapatan (Rp)'
                            },
                            ticks: {
                                callback: function (value) {
                                    if (value >= 1000000) {
                                        return 'Rp ' + (value / 1000000).toFixed(1) + 'Jt';
                                    }
                                    return 'Rp ' + formatNumber(value);
                                }
                            }
                        },
                        y1: {
                            beginAtZero: true,
                            position: 'right',
                            title: {
                                display: true,
                                text: 'Jumlah Order'
                            },
                            grid: {
                                drawOnChartArea: false
                            }
                        }
                    },
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function (context) {
                                    let label = context.dataset.label || '';
                                    if (label.includes('Pendapatan')) {
                                        return label + ': Rp ' + formatNumber(context.parsed.y);
                                    } else {
                                        return label + ': ' + formatNumber(context.parsed.y);
                                    }
                                }
                            }
                        }
                    }
                }
            });

            // Chart 1: Daily Orders & Revenue
            const dailyChart = initChart('dailyOrdersChart', {
                type: 'bar',
                data: {
                    labels: {!! json_encode($chartData['dailyData']->pluck('date')) !!},
                    datasets: [
                        {
                            label: 'Jumlah Order',
                            data: {!! json_encode($chartData['dailyData']->pluck('order_count')) !!},
                            backgroundColor: colors.emerald[500],
                            order: 2,
                            yAxisID: 'y'
                        },
                        {
                            label: 'Pendapatan (Rp)',
                            data: {!! json_encode($chartData['dailyData']->pluck('revenue')) !!},
                            borderColor: colors.emerald[700],
                            backgroundColor: 'transparent',
                            type: 'line',
                            yAxisID: 'y1',
                            order: 1,
                            tension: 0.4,
                            borderWidth: 2
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    interaction: { mode: 'index', intersect: false },
                    scales: {
                        x: { grid: { display: false } },
                        y: {
                            type: 'linear',
                            display: true,
                            position: 'left',
                            title: { display: true, text: 'Jumlah Order' },
                            beginAtZero: true
                        },
                        y1: {
                            type: 'linear',
                            display: true,
                            position: 'right',
                            title: { display: true, text: 'Pendapatan (Rp)' },
                            grid: { drawOnChartArea: false },
                            beginAtZero: true,
                            ticks: {
                                callback: function (value) {
                                    return 'Rp ' + formatNumber(value);
                                }
                            }
                        }
                    }
                }
            });

            // Chart 2: Order Status Distribution
            const statusChart = initChart('orderStatusChart', {
                type: 'doughnut',
                data: {
                    labels: {!! json_encode($chartData['orderStatusData']->pluck('status')) !!},
                    datasets: [{
                        data: {!! json_encode($chartData['orderStatusData']->pluck('count')) !!},
                        backgroundColor: [
                            colors.emerald[500],
                            colors.warning,
                            colors.danger,
                            colors.info,
                            colors.secondary
                        ],
                        borderWidth: 2,
                        borderColor: '#fff'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'bottom' }
                    }
                }
            });

            // Chart 3: Payment Methods
            const paymentChart = initChart('paymentMethodChart', {
                type: 'pie',
                data: {
                    labels: {!! json_encode($chartData['paymentMethodData']->pluck('payment_method')) !!},
                    datasets: [{
                        data: {!! json_encode($chartData['paymentMethodData']->pluck('count')) !!},
                        backgroundColor: [
                            colors.emerald[500],
                            colors.emerald[600],
                            colors.emerald[700],
                            colors.info,
                            colors.warning
                        ],
                        borderWidth: 2,
                        borderColor: '#fff'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'bottom' }
                    }
                }
            });

            // Chart 4: Top Selling Products
            const productsChart = initChart('topProductsChart', {
                type: 'bar',
                data: {
                    labels: {!! json_encode($chartData['topProductsData']->pluck('product_name')) !!},
                    datasets: [{
                        label: 'Jumlah Terjual',
                        data: {!! json_encode($chartData['topProductsData']->pluck('total_sold')) !!},
                        backgroundColor: colors.emerald[500],
                        borderWidth: 0,
                        borderRadius: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    indexAxis: 'y',
                    scales: {
                        x: {
                            beginAtZero: true,
                            ticks: {
                                callback: function (value) {
                                    return formatNumber(value);
                                }
                            }
                        }
                    }
                }
            });

            console.log('Charts initialization completed');
        });
    </script>
@endsection
