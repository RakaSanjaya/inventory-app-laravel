@extends('layouts.app')

@section('title', 'Account Details')

@section('content')
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="mb-8">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                    <div>
                        <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-2">Detail Akun</h1>
                        <p class="text-gray-600 text-lg">Informasi lengkap tentang akun pengguna</p>
                    </div>
                    <div class="mt-4 lg:mt-0">
                        <a href="{{ route('accounts.index') }}"
                            class="inline-flex items-center gap-2 bg-gray-600 hover:bg-gray-700 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            <span>Kembali ke Daftar Akun</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- User Profile Card -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-lg p-6">
                        <div class="text-center mb-6">
                            <!-- Avatar dengan Placeholder -->
                            <div class="relative mx-auto mb-4">
                                @if($user->avatar && Storage::disk('public')->exists($user->avatar))
                                    <img src="{{ Storage::url($user->avatar) }}" alt="{{ $user->name }}"
                                        class="w-20 h-20 rounded-2xl object-cover mx-auto shadow-lg border-2 border-gray-200">
                                @else
                                    <!-- Placeholder Avatar dengan Initials -->
                                    <div
                                        class="w-20 h-20 bg-gradient-to-r from-green-600 to-emerald-500 rounded-2xl flex items-center justify-center mx-auto shadow-lg border-2 border-white">
                                        <span class="text-white text-xl font-bold">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </span>
                                    </div>
                                @endif

                                <!-- Online Status Indicator -->
                                <div class="absolute bottom-0 right-0 transform -translate-x-1 -translate-y-1">
                                    <div class="w-4 h-4 bg-green-500 border-2 border-white rounded-full"></div>
                                </div>
                            </div>

                            <h2 class="text-xl font-bold text-gray-900">{{ $user->name }}</h2>
                            <p class="text-gray-500 text-sm mt-1">{{ $user->email }}</p>

                            <!-- Role Badge -->
                            <div class="mt-3">
                                @php
                                    $roleColors = [
                                        'super_admin' => 'bg-purple-100 text-purple-800',
                                        'admin' => 'bg-blue-100 text-blue-800',
                                        'user' => 'bg-green-100 text-green-800'
                                    ];
                                    $roleColor = $roleColors[$user->role] ?? 'bg-gray-100 text-gray-800';
                                @endphp
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $roleColor }} capitalize">
                                    <span class="w-2 h-2 rounded-full mr-2
                                        {{ $user->role == 'super_admin' ? 'bg-purple-500' :
        ($user->role == 'admin' ? 'bg-blue-500' : 'bg-green-500') }}"></span>
                                    {{ $user->role }}
                                </span>
                            </div>
                        </div>

                        <!-- Quick Stats -->
                        <div class="space-y-4">
                            <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                                <span class="text-gray-600 text-sm">Status</span>
                                <span
                                    class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    <span class="w-2 h-2 bg-green-500 rounded-full mr-1"></span>
                                    Aktif
                                </span>
                            </div>

                            <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                                <span class="text-gray-600 text-sm">ID Pengguna</span>
                                <span class="text-sm font-mono text-gray-900">{{ $user->id }}</span>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="mt-6 pt-6 border-t border-gray-200 space-y-3">
                            <a href="{{ route('accounts.edit', $user->id) }}"
                                class="w-full inline-flex items-center justify-center gap-2 bg-gradient-to-r from-green-600 to-emerald-500 hover:from-green-700 hover:to-emerald-600 text-white font-semibold py-3 px-4 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                    </path>
                                </svg>
                                Edit Akun
                            </a>

                            @if(auth()->user()->role == 'super_admin' && auth()->user()->id != $user->id)
                                <form action="{{ route('accounts.destroy', $user->id) }}" method="POST"
                                    class="inline-block w-full">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="w-full inline-flex items-center justify-center gap-2 bg-red-600 hover:bg-red-700 text-white font-semibold py-3 px-4 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus akun ini?')">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                            </path>
                                        </svg>
                                        Hapus Akun
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Account Details Card -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-lg overflow-hidden">
                        <div class="bg-gradient-to-r from-green-600 to-emerald-500 px-6 py-4">
                            <div class="flex items-center justify-between">
                                <h2 class="text-xl font-bold text-white">Informasi Detail Akun</h2>
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
                                <!-- Personal Information Section -->
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center gap-2">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                            </path>
                                        </svg>
                                        Informasi Pribadi
                                    </h3>

                                    <!-- Name -->
                                    <div class="flex flex-col sm:flex-row sm:items-start mb-4">
                                        <div class="sm:w-1/3 mb-2 sm:mb-0">
                                            <label class="text-sm font-semibold text-gray-700">Nama Lengkap</label>
                                        </div>
                                        <div class="sm:w-2/3">
                                            <p class="text-gray-900 font-medium">{{ $user->name }}</p>
                                        </div>
                                    </div>

                                    <!-- Email -->
                                    <div class="flex flex-col sm:flex-row sm:items-start mb-4">
                                        <div class="sm:w-1/3 mb-2 sm:mb-0">
                                            <label class="text-sm font-semibold text-gray-700">Alamat Email</label>
                                        </div>
                                        <div class="sm:w-2/3">
                                            <p class="text-gray-900 font-medium">{{ $user->email }}</p>
                                            <p class="text-sm text-gray-500 mt-1">Digunakan untuk login ke sistem</p>
                                        </div>
                                    </div>

                                    <!-- Phone -->
                                    <div class="flex flex-col sm:flex-row sm:items-start mb-4">
                                        <div class="sm:w-1/3 mb-2 sm:mb-0">
                                            <label class="text-sm font-semibold text-gray-700">Nomor Telepon</label>
                                        </div>
                                        <div class="sm:w-2/3">
                                            <p class="text-gray-900 font-medium">
                                                @if($user->phone)
                                                    {{ $user->phone }}
                                                @else
                                                    <span class="text-gray-400 italic">Belum diatur</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Address -->
                                    <div class="flex flex-col sm:flex-row sm:items-start">
                                        <div class="sm:w-1/3 mb-2 sm:mb-0">
                                            <label class="text-sm font-semibold text-gray-700">Alamat</label>
                                        </div>
                                        <div class="sm:w-2/3">
                                            <p class="text-gray-900">
                                                @if($user->address)
                                                    {{ $user->address }}
                                                @else
                                                    <span class="text-gray-400 italic">Belum diatur</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Account Information Section -->
                                <div class="pt-6 border-t border-gray-200">
                                    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center gap-2">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                            </path>
                                        </svg>
                                        Informasi Akun
                                    </h3>

                                    <!-- Role -->
                                    <div class="flex flex-col sm:flex-row sm:items-start mb-4">
                                        <div class="sm:w-1/3 mb-2 sm:mb-0">
                                            <label class="text-sm font-semibold text-gray-700">Role / Peran</label>
                                        </div>
                                        <div class="sm:w-2/3">
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $roleColor }} capitalize">
                                                {{ $user->role }}
                                            </span>
                                            <p class="text-sm text-gray-500 mt-2">
                                                @if($user->role == 'super_admin')
                                                    Akses penuh ke semua fitur sistem
                                                @elseif($user->role == 'admin')
                                                    Dapat mengelola produk dan stok
                                                @else
                                                    Hanya dapat melihat data produk
                                                @endif
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Account ID -->
                                    <div class="flex flex-col sm:flex-row sm:items-start">
                                        <div class="sm:w-1/3 mb-2 sm:mb-0">
                                            <label class="text-sm font-semibold text-gray-700">ID Akun</label>
                                        </div>
                                        <div class="sm:w-2/3">
                                            <code class="text-sm bg-gray-100 px-3 py-2 rounded-lg text-gray-800 font-mono">
                                                {{ $user->id }}
                                            </code>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Timestamps -->
                            <div class="pt-6 mt-6 border-t border-gray-200">
                                <h4 class="text-sm font-semibold text-gray-700 mb-4">Informasi Sistem</h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                                    <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <div>
                                            <p class="text-gray-600">Dibuat Pada</p>
                                            <p class="text-gray-900 font-medium">
                                                {{ $user->created_at->format('d M Y H:i') }}</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <div>
                                            <p class="text-gray-600">Terakhir Diupdate</p>
                                            <p class="text-gray-900 font-medium">
                                                {{ $user->updated_at->format('d M Y H:i') }}</p>
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