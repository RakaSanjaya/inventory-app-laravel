@extends('layouts.app')

@section('title', 'Edit Account')

@section('content')
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="mb-8">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                    <div>
                        <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-2">Edit Akun</h1>
                        <p class="text-gray-600 text-lg">Perbarui informasi untuk akun {{ $user->name }}</p>
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

            <!-- User Info Card -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-lg p-6 mb-6">
                <div class="flex items-center gap-4">
                    <div
                        class="w-16 h-16 bg-gradient-to-r from-green-600 to-emerald-500 rounded-2xl flex items-center justify-center shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-gray-900">{{ $user->name }}</h3>
                        <p class="text-gray-600 text-sm">{{ $user->email }}</p>
                        <div class="flex items-center gap-2 mt-1">
                            @php
                                $roleColors = [
                                    'super_admin' => 'bg-purple-100 text-purple-800',
                                    'admin' => 'bg-blue-100 text-blue-800',
                                    'user' => 'bg-green-100 text-green-800'
                                ];
                                $roleColor = $roleColors[$user->role] ?? 'bg-gray-100 text-gray-800';
                            @endphp
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $roleColor }} capitalize">
                                {{ $user->role }}
                            </span>
                            <span class="text-xs text-gray-500">ID: {{ $user->id }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Form -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-lg hover:shadow-xl transition-all duration-300">
                <div class="bg-gradient-to-r from-green-600 to-emerald-500 px-6 py-4 rounded-t-2xl">
                    <div class="flex items-center justify-between">
                        <h2 class="text-xl font-bold text-white">Formulir Edit Akun</h2>
                        <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>

                <form action="{{ route('accounts.update', $user->id) }}" method="POST" class="p-6 space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Name -->
                    <div class="space-y-2">
                        <label for="name" class="block text-sm font-semibold text-gray-700">
                            Nama Lengkap <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                                class="w-full border border-gray-300 rounded-xl py-3 px-4 pl-12 focus:border-green-600 focus:ring-2 focus:ring-green-200 transition duration-300 ease-in-out outline-none"
                                placeholder="Masukkan nama lengkap" required>
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                        </div>
                        @error('name')
                            <p class="text-red-500 text-sm mt-1 flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="space-y-2">
                        <label for="email" class="block text-sm font-semibold text-gray-700">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                                class="w-full border border-gray-300 rounded-xl py-3 px-4 pl-12 focus:border-green-600 focus:ring-2 focus:ring-green-200 transition duration-300 ease-in-out outline-none"
                                placeholder="email@example.com" required>
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        @error('email')
                            <p class="text-red-500 text-sm mt-1 flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Di dalam form edit, tambahkan field phone dan address -->
                    <div class="space-y-2">
                        <label for="phone" class="block text-sm font-semibold text-gray-700">
                            Nomor Telepon
                        </label>
                        <div class="relative">
                            <input type="tel" name="phone" id="phone" value="{{ old('phone', $user->phone) }}"
                                class="w-full border border-gray-300 rounded-xl py-3 px-4 pl-12 focus:border-green-600 focus:ring-2 focus:ring-green-200 transition duration-300 ease-in-out outline-none"
                                placeholder="081234567890">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="address" class="block text-sm font-semibold text-gray-700">
                            Alamat
                        </label>
                        <textarea name="address" id="address" rows="3"
                            class="w-full border border-gray-300 rounded-xl py-3 px-4 focus:border-green-600 focus:ring-2 focus:ring-green-200 transition duration-300 ease-in-out outline-none resize-none"
                            placeholder="Masukkan alamat lengkap">{{ old('address', $user->address) }}</textarea>
                    </div>  

                    <!-- Role -->
                    <div class="space-y-2">
                        <label for="role" class="block text-sm font-semibold text-gray-700">
                            Role <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <select name="role" id="role"
                                class="w-full border border-gray-300 rounded-xl py-3 px-4 pl-12 focus:border-green-600 focus:ring-2 focus:ring-green-200 transition duration-300 ease-in-out outline-none appearance-none bg-white"
                                required>
                                <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
                                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin
                                </option>
                                @if(auth()->user()->role == 'super_admin')
                                    <option value="super_admin" {{ old('role', $user->role) == 'super_admin' ? 'selected' : '' }}>
                                        Super Admin</option>
                                @endif
                            </select>
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                        @error('role')
                            <p class="text-red-500 text-sm mt-1 flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Role Information -->
                    <div class="bg-blue-50 border border-blue-200 rounded-xl p-4">
                        <h4 class="font-semibold text-blue-900 mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Informasi Role
                        </h4>
                        <ul class="text-sm text-blue-700 space-y-1">
                            <li>• <strong>User:</strong> Hanya dapat melihat data produk</li>
                            <li>• <strong>Admin:</strong> Dapat mengelola produk dan stok</li>
                            @if(auth()->user()->role == 'super_admin')
                                <li>• <strong>Super Admin:</strong> Akses penuh ke semua fitur sistem</li>
                            @endif
                        </ul>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200">
                        <button type="submit"
                            class="inline-flex items-center justify-center gap-2 bg-gradient-to-r from-green-600 to-emerald-500 hover:from-green-700 hover:to-emerald-600 text-white font-semibold py-3 px-8 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl flex-1">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            <span>Perbarui Akun</span>
                        </button>

                        <a href="{{ route('accounts.index') }}"
                            class="inline-flex items-center justify-center gap-2 bg-gray-600 hover:bg-gray-700 text-white font-semibold py-3 px-8 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg text-center">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            <span>Batal</span>
                        </a>
                    </div>
                </form>
            </div>

            <!-- Additional Information -->
            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Dibuat Pada</p>
                            <p class="text-sm font-semibold text-gray-900">{{ $user->created_at->format('d M Y H:i') }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Terakhir Diupdate</p>
                            <p class="text-sm font-semibold text-gray-900">{{ $user->updated_at->format('d M Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
