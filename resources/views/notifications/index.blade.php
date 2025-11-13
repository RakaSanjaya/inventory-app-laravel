@extends('layouts.app')

@section('title', 'Notifikasi')

@section('content')
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8  ">
            <!-- Header Section -->
            <div class="mb-8">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                    <div>
                        <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-2">Manajemen Notifikasi</h1>
                        <p class="text-gray-600 text-lg">Kelola semua notifikasi dan pesan sistem Anda</p>
                    </div>

                    @if($notifications->count() > 0)
                        <div class="mt-4 lg:mt-0">
                            <div class="flex items-center gap-3">
                                <div class="bg-white rounded-xl p-3 border border-gray-100 shadow-sm">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center mr-3">
                                            <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                                </path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-500">Belum Dibaca</p>
                                            <p class="text-lg font-semibold text-gray-900">
                                                {{ $notifications->where('is_read', false)->count() }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

            <!-- Notifications Section -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-lg overflow-hidden">
                <div class="bg-gradient-to-r from-green-600 to-emerald-500 px-6 py-4">
                    <div class="flex items-center justify-between">
                        <h2 class="text-xl font-bold text-white">Daftar Notifikasi</h2>
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                    </path>
                                </svg>
                            </div>
                            <span class="text-white/90 text-sm">Total: {{ $notifications->count() }} notifikasi</span>
                        </div>
                    </div>
                </div>

                <div class="p-6">
                    @forelse ($notifications as $notification)
                        <div
                            class="bg-gray-50 rounded-xl p-4 mb-4 border border-gray-200 transition-all duration-300 hover:shadow-md {{ $notification->is_read ? 'opacity-75' : '' }}">
                            <div class="flex items-start justify-between">
                                <div class="flex items-start space-x-4 flex-1">
                                    <!-- Status Indicator -->
                                    <div class="flex-shrink-0 mt-1">
                                        @if (!$notification->is_read)
                                            <div class="w-3 h-3 bg-yellow-500 rounded-full animate-pulse"></div>
                                        @else
                                            <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                        @endif
                                    </div>

                                    <!-- Notification Content -->
                                    <div class="flex-1 min-w-0">
                                        <p
                                            class="text-gray-800 font-medium mb-1 {{ $notification->is_read ? '' : 'text-gray-900' }}">
                                            {{ $notification->message }}
                                        </p>
                                        <div class="flex items-center text-sm text-gray-500">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span>{{ $notification->created_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="flex items-center space-x-2 ml-4">
                                    @if (!$notification->is_read)
                                        <a href="{{ route('notifications.markAsRead', $notification->id) }}"
                                            class="inline-flex items-center gap-1 bg-blue-50 hover:bg-blue-100 text-blue-600 px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-200"
                                            title="Tandai sebagai dibaca">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            Tandai Baca
                                        </a>
                                    @else
                                        <span
                                            class="inline-flex items-center gap-1 bg-green-50 text-green-600 px-3 py-2 rounded-lg text-sm font-medium">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            Sudah Dibaca
                                        </span>
                                    @endif

                                    <a href="{{ route('notifications.delete', $notification->id) }}"
                                        class="inline-flex items-center gap-1 bg-red-50 hover:bg-red-100 text-red-600 px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-200"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus notifikasi ini?')"
                                        title="Hapus notifikasi">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                            </path>
                                        </svg>
                                        Hapus
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-12">
                            <div class="flex flex-col items-center justify-center">
                                <svg class="w-16 h-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                    </path>
                                </svg>
                                <p class="text-gray-500 text-lg mb-2">Tidak ada notifikasi</p>
                                <p class="text-gray-400 text-sm">Semua notifikasi akan muncul di sini</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Quick Actions -->
            @if($notifications->count() > 0)
                <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-900">Tandai Semua Dibaca</p>
                                <p class="text-xs text-gray-500 mt-1">Tandai semua notifikasi sebagai sudah dibaca</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-900">Notifikasi Aktif</p>
                                <p class="text-xs text-gray-500 mt-1">Sistem akan terus mengirimkan pembaruan</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pagination -->
                @if ($notifications->hasPages())
                    <div class="mt-6 bg-white rounded-xl p-4 border border-gray-100 shadow-sm">
                        {{ $notifications->links() }}
                    </div>
                @endif
            @endif
        </div>
    </div>

    <style>
        /* Custom pagination styling to match our design system */
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
        }

        .pagination .page-item .page-link {
            padding: 0.5rem 1rem;
            border: 1px solid #e5e7eb;
            border-radius: 0.75rem;
            color: #6b7280;
            transition: all 0.3s ease;
        }

        .pagination .page-item.active .page-link {
            background: linear-gradient(to right, #10b981, #059669);
            border-color: #10b981;
            color: white;
        }

        .pagination .page-item:not(.active) .page-link:hover {
            background-color: #f3f4f6;
            border-color: #d1d5db;
            color: #374151;
        }
    </style>
@endsection