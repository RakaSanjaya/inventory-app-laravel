@extends('layouts.app')

@section('title', 'History of Activities')

@section('content')
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="mb-8">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                    <div>
                        <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-2">Riwayat Aktivitas</h1>
                        <p class="text-gray-600 text-lg">Pantau semua aktivitas dan perubahan dalam sistem inventory</p>
                    </div>
                    @if(Auth::user()->role == 'super_admin' && !$historyActivities->isEmpty())
                        <div class="mt-4 lg:mt-0">
                            <form id="delete-all-form" action="{{ route('history.destroyAll') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus semua riwayat aktivitas?')">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>
                                    <span>Hapus Semua Riwayat</span>
                                </button>
                            </form>
                        </div>
                    @endif
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

            @if(session('error'))
                <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl flex items-center gap-3">
                    <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="font-medium">{{ session('error') }}</span>
                </div>
            @endif

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div
                    class="bg-white rounded-2xl p-6 border border-gray-100 shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500">Total Aktivitas</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $stats['total'] ?? 0 }}</p>
                        </div>
                        <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white rounded-2xl p-6 border border-gray-100 shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500">Aktivitas Hari Ini</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $stats['today'] ?? 0 }}</p>
                        </div>
                        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white rounded-2xl p-6 border border-gray-100 shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500">Stok Masuk</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $stats['stock_in'] ?? 0 }}</p>
                        </div>
                        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white rounded-2xl p-6 border border-gray-100 shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500">Stok Keluar</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $stats['stock_out'] ?? 0 }}</p>
                        </div>
                        <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filter Section -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-lg p-6 mb-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.207A1 1 0 013 6.5V4z">
                        </path>
                    </svg>
                    Filter Riwayat
                </h3>
                <form action="{{ route('history.filter') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <!-- Activity Type Filter -->
                    <div>
                        <label for="activity_type" class="block text-sm font-medium text-gray-700 mb-2">Jenis
                            Aktivitas</label>
                        <select name="activity_type" id="activity_type"
                            class="w-full border border-gray-300 rounded-xl py-2 px-3 focus:border-green-600 focus:ring-2 focus:ring-green-200 outline-none transition duration-300">
                            <option value="">Semua Jenis</option>
                            <option value="stock_in" {{ request('activity_type') == 'stock_in' ? 'selected' : '' }}>Stok Masuk
                            </option>
                            <option value="stock_out" {{ request('activity_type') == 'stock_out' ? 'selected' : '' }}>Stok
                                Keluar</option>
                            <option value="added" {{ request('activity_type') == 'added' ? 'selected' : '' }}>Dibuat
                            </option>
                            <option value="updated" {{ request('activity_type') == 'updated' ? 'selected' : '' }}>Diupdate
                            </option>
                            <option value="deleted" {{ request('activity_type') == 'deleted' ? 'selected' : '' }}>Dihapus
                            </option>
                        </select>
                    </div>

                    <!-- Date Range -->
                    <div>
                        <label for="start_date" class="block text-sm font-medium text-gray-700 mb-2">Dari Tanggal</label>
                        <input type="date" name="start_date" id="start_date" value="{{ request('start_date') }}"
                            class="w-full border border-gray-300 rounded-xl py-2 px-3 focus:border-green-600 focus:ring-2 focus:ring-green-200 outline-none transition duration-300">
                    </div>

                    <div>
                        <label for="end_date" class="block text-sm font-medium text-gray-700 mb-2">Sampai Tanggal</label>
                        <input type="date" name="end_date" id="end_date" value="{{ request('end_date') }}"
                            class="w-full border border-gray-300 rounded-xl py-2 px-3 focus:border-green-600 focus:ring-2 focus:ring-green-200 outline-none transition duration-300">
                    </div>

                    <!-- Search -->
                    <div>
                        <label for="search" class="block text-sm font-medium text-gray-700 mb-2">Pencarian</label>
                        <div class="flex gap-2">
                            <input type="text" name="search" id="search" value="{{ request('search') }}"
                                placeholder="Cari produk, aktor..."
                                class="flex-1 border border-gray-300 rounded-xl py-2 px-3 focus:border-green-600 focus:ring-2 focus:ring-green-200 outline-none transition duration-300">
                            <button type="submit"
                                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-xl transition-colors duration-200 flex items-center justify-center">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Reset Filter -->
                @if(request()->anyFilled(['activity_type', 'start_date', 'end_date', 'search']))
                    <div class="mt-4 flex justify-between items-center">
                        <p class="text-sm text-gray-600">
                            Menampilkan hasil filter
                            @if(request('activity_type'))
                                • Jenis: {{ ucfirst(str_replace('_', ' ', request('activity_type'))) }}
                            @endif
                            @if(request('start_date'))
                                • Dari: {{ request('start_date') }}
                            @endif
                            @if(request('end_date'))
                                • Sampai: {{ request('end_date') }}
                            @endif
                            @if(request('search'))
                                • Pencarian: "{{ request('search') }}"
                            @endif
                        </p>
                        <a href="{{ route('history.index') }}"
                            class="text-sm text-green-600 hover:text-green-700 font-medium flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                </path>
                            </svg>
                            Reset Filter
                        </a>
                    </div>
                @endif
            </div>

            <!-- Activities Table -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-lg overflow-hidden">
                <div class="bg-gradient-to-r from-green-600 to-emerald-500 px-6 py-4">
                    <div class="flex items-center justify-between">
                        <h2 class="text-xl font-bold text-white">Daftar Riwayat Aktivitas</h2>
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <span class="text-white/90 text-sm">Total: {{ $historyActivities->total() }} aktivitas</span>
                        </div>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Aktivitas</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Produk</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Jumlah</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Deskripsi</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Aktor</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Waktu</th>
                                @if(Auth::user()->role == 'super_admin')
                                    <th
                                        class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse ($historyActivities as $activity)
                                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                                    <!-- Activity Type -->
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        @php
                                                            $activityColors = [
                                                                'stock_in' => 'bg-green-100 text-green-800 border-green-200',
                                                                'stock_out' => 'bg-red-100 text-red-800 border-red-200',
                                                                'created' => 'bg-blue-100 text-blue-800 border-blue-200',
                                                                'updated' => 'bg-yellow-100 text-yellow-800 border-yellow-200',
                                                                'deleted' => 'bg-gray-100 text-gray-800 border-gray-200'
                                                            ];
                                                            $activityColor = $activityColors[$activity->activity_type] ?? 'bg-gray-100 text-gray-800 border-gray-200';
                                                        @endphp
                                                        <span
                                                            class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium {{ $activityColor }} border capitalize">
                                                            @if($activity->activity_type == 'stock_in')
                                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                                                </svg>
                                                                Stok Masuk
                                                            @elseif($activity->activity_type == 'stock_out')
                                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                        d="M20 12H4"></path>
                                                                </svg>
                                                                Stok Keluar
                                                            @else
                                                                {{ ucfirst(str_replace('_', ' ', $activity->activity_type)) }}
                                                            @endif
                                                        </span>
                                                    </td>

                                                    <!-- Product Name -->
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm font-medium text-gray-900">{{ $activity->name_product }}</div>
                                                    </td>

                                                    <!-- Quantity Change -->
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div
                                                            class="text-sm font-semibold
                                                            {{ $activity->activity_type == 'stock_in' ? 'text-green-600' :
                                ($activity->activity_type == 'stock_out' ? 'text-red-600' : 'text-gray-600') }}">
                                                            @if($activity->activity_type == 'stock_in')
                                                                +{{ $activity->quantity_change }}
                                                            @elseif($activity->activity_type == 'stock_out')
                                                                -{{ $activity->quantity_change }}
                                                            @else
                                                                {{ $activity->quantity_change ?? '-' }}
                                                            @endif
                                                        </div>
                                                    </td>

                                                    <!-- Description -->
                                                    <td class="px-6 py-4">
                                                        <div class="text-sm text-gray-900 max-w-xs">
                                                            @if($activity->description)
                                                                {{ $activity->description }}
                                                            @else
                                                                <span class="text-gray-400 italic">Tidak ada deskripsi</span>
                                                            @endif
                                                        </div>
                                                    </td>

                                                    <!-- Actor -->
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="flex items-center">
                                                            <div
                                                                class="flex-shrink-0 w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center mr-3">
                                                                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor"
                                                                    viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                                    </path>
                                                                </svg>
                                                            </div>
                                                            <div class="text-sm font-medium text-gray-900">{{ $activity->actor }}</div>
                                                        </div>
                                                    </td>

                                                    <!-- Timestamp -->
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-gray-900 font-medium">
                                                            {{ $activity->created_at->format('d M Y') }}</div>
                                                        <div class="text-xs text-gray-500">{{ $activity->created_at->format('H:i') }}</div>
                                                    </td>

                                                    <!-- Actions -->
                                                    @if(Auth::user()->role == 'super_admin')
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <form action="{{ route('history.destroy', $activity->id) }}" method="POST"
                                                                class="delete-form">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="inline-flex items-center gap-1 bg-red-50 hover:bg-red-100 text-red-600 px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-200 border border-red-200"
                                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus riwayat ini?')">
                                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                                        </path>
                                                                    </svg>
                                                                    Hapus
                                                                </button>
                                                            </form>
                                                        </td>
                                                    @endif
                                                </tr>
                            @empty
                                <tr>
                                    <td colspan="{{ Auth::user()->role == 'super_admin' ? '7' : '6' }}"
                                        class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <svg class="w-16 h-16 text-gray-400 mb-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <p class="text-gray-500 text-lg mb-2">Belum ada riwayat aktivitas</p>
                                            <p class="text-gray-400 text-sm">Semua aktivitas sistem akan tercatat di sini</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if($historyActivities->hasPages())
                    <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
                        <div class="flex items-center justify-between">
                            <div class="text-sm text-gray-700">
                                Menampilkan
                                <span class="font-medium">{{ $historyActivities->firstItem() }}</span>
                                sampai
                                <span class="font-medium">{{ $historyActivities->lastItem() }}</span>
                                dari
                                <span class="font-medium">{{ $historyActivities->total() }}</span>
                                hasil
                            </div>
                            <div class="flex space-x-2">
                                {{ $historyActivities->links() }}
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Konfirmasi penghapusan semua riwayat aktivitas
        document.getElementById('delete-all-form')?.addEventListener('submit', function (event) {
            if (!confirm('Apakah Anda yakin ingin menghapus semua riwayat aktivitas? Tindakan ini tidak dapat dibatalkan.')) {
                event.preventDefault();
            }
        });

        // Auto-submit filter ketika select berubah
        document.getElementById('activity_type')?.addEventListener('change', function () {
            this.form.submit();
        });

        // Date validation
        document.getElementById('start_date')?.addEventListener('change', function () {
            const endDate = document.getElementById('end_date');
            if (this.value && endDate.value && this.value > endDate.value) {
                endDate.value = this.value;
            }
        });

        document.getElementById('end_date')?.addEventListener('change', function () {
            const startDate = document.getElementById('start_date');
            if (this.value && startDate.value && this.value < startDate.value) {
                startDate.value = this.value;
            }
        });
    </script>
@endsection
