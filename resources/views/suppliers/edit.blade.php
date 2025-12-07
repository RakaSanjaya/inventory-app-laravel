@extends('layouts.app')

@section('title', 'Edit Supplier')

@section('content')
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
            <!-- Header Section -->
            <div class="mb-8">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                    <div>
                        <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-2">Edit Supplier</h1>
                        <p class="text-gray-600 text-lg">Perbarui informasi supplier {{ $supplier->name }}</p>
                    </div>
                    <div class="mt-4 lg:mt-0">
                        <a href="{{ route('suppliers.index') }}"
                            class="inline-flex items-center gap-2 bg-gray-600 hover:bg-gray-700 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            <span>Kembali ke Daftar Supplier</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="max-w-full">
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

                @if(session('warning'))
                    <div
                        class="mb-6 bg-yellow-50 border border-yellow-200 text-yellow-700 px-4 py-3 rounded-xl flex items-center gap-3">
                        <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.35 16.5c-.77.833.192 2.5 1.732 2.5z">
                            </path>
                        </svg>
                        <span class="font-medium">{{ session('warning') }}</span>
                    </div>
                @endif

                @if($errors->any())
                    <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl">
                        <div class="flex items-center gap-3 mb-2">
                            <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="font-semibold">Terjadi kesalahan</span>
                        </div>
                        <ul class="text-sm list-disc list-inside space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form Section -->
                <div
                    class="bg-white rounded-2xl border border-gray-100 shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="bg-gradient-to-r from-green-600 to-emerald-500 px-6 py-4 rounded-t-2xl">
                        <div class="flex items-center justify-between">
                            <h2 class="text-xl font-bold text-white">Formulir Edit Supplier</h2>
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                        </path>
                                    </svg>
                                </div>
                                <span class="text-white/90 text-sm">ID: {{ $supplier->id }}</span>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST" class="p-6 space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <!-- Supplier Name -->
                            <div class="space-y-2">
                                <label for="name" class="block text-sm font-semibold text-gray-700">
                                    Nama Supplier <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <input type="text" name="name" id="name" value="{{ old('name', $supplier->name) }}"
                                        class="w-full border border-gray-300 rounded-xl py-3 px-4 pl-12 focus:border-blue-600 focus:ring-2 focus:ring-blue-200 transition duration-300 ease-in-out outline-none"
                                        placeholder="Masukkan nama supplier" required>
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                            </path>
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

                            <!-- Company -->
                            <div class="space-y-2">
                                <label for="company" class="block text-sm font-semibold text-gray-700">
                                    Nama Perusahaan
                                </label>
                                <div class="relative">
                                    <input type="text" name="company" id="company"
                                        value="{{ old('company', $supplier->company) }}"
                                        class="w-full border border-gray-300 rounded-xl py-3 px-4 pl-12 focus:border-blue-600 focus:ring-2 focus:ring-blue-200 transition duration-300 ease-in-out outline-none"
                                        placeholder="Masukkan nama perusahaan">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                @error('company')
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
                                    Email
                                </label>
                                <div class="relative">
                                    <input type="email" name="email" id="email" value="{{ old('email', $supplier->email) }}"
                                        class="w-full border border-gray-300 rounded-xl py-3 px-4 pl-12 focus:border-blue-600 focus:ring-2 focus:ring-blue-200 transition duration-300 ease-in-out outline-none"
                                        placeholder="email@example.com">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
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

                            <!-- Phone -->
                            <div class="space-y-2">
                                <label for="phone" class="block text-sm font-semibold text-gray-700">
                                    Nomor Telepon
                                </label>
                                <div class="relative">
                                    <input type="text" name="phone" id="phone" value="{{ old('phone', $supplier->phone) }}"
                                        class="w-full border border-gray-300 rounded-xl py-3 px-4 pl-12 focus:border-blue-600 focus:ring-2 focus:ring-blue-200 transition duration-300 ease-in-out outline-none"
                                        placeholder="+62 812 3456 7890">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                @error('phone')
                                    <p class="text-red-500 text-sm mt-1 flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- PIC -->
                            <div class="space-y-2 lg:col-span-2">
                                <label for="pic" class="block text-sm font-semibold text-gray-700">
                                    Person In Charge (PIC)
                                </label>
                                <div class="relative">
                                    <input type="text" name="pic" id="pic" value="{{ old('pic', $supplier->pic) }}"
                                        class="w-full border border-gray-300 rounded-xl py-3 px-4 pl-12 focus:border-blue-600 focus:ring-2 focus:ring-blue-200 transition duration-300 ease-in-out outline-none"
                                        placeholder="Masukkan nama PIC">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                @error('pic')
                                    <p class="text-red-500 text-sm mt-1 flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="space-y-2">
                            <label for="address" class="block text-sm font-semibold text-gray-700">Alamat</label>
                            <textarea name="address" id="address" rows="3"
                                class="w-full border border-gray-300 rounded-xl py-3 px-4 focus:border-blue-600 focus:ring-2 focus:ring-blue-200 transition duration-300 ease-in-out outline-none resize-none"
                                placeholder="Masukkan alamat lengkap">{{ old('address', $supplier->address) }}</textarea>
                            @error('address')
                                <p class="text-red-500 text-sm mt-1 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Notes -->
                        <div class="space-y-2">
                            <label for="notes" class="block text-sm font-semibold text-gray-700">Catatan</label>
                            <textarea name="notes" id="notes" rows="4"
                                class="w-full border border-gray-300 rounded-xl py-3 px-4 focus:border-blue-600 focus:ring-2 focus:ring-blue-200 transition duration-300 ease-in-out outline-none resize-none"
                                placeholder="Tambahkan catatan tambahan (opsional)">{{ old('notes', $supplier->notes) }}</textarea>
                            @error('notes')
                                <p class="text-red-500 text-sm mt-1 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200">
                            <button type="submit"
                                class="inline-flex items-center justify-center gap-2 bg-gradient-to-r from-green-600 to-emerald-500 text-white font-semibold py-3 px-8 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl flex-1">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Update Supplier</span>
                            </button>

                            <a href="{{ route('suppliers.index') }}"
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

                <!-- Supplier Info -->
                <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Dibuat Pada</p>
                                <p class="text-sm font-semibold text-gray-900">{{ $supplier->created_at->format('d M Y') }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Terakhir Diupdate</p>
                                <p class="text-sm font-semibold text-gray-900">{{ $supplier->updated_at->format('d M Y') }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">ID Supplier</p>
                                <p class="text-sm font-semibold text-gray-900">
                                    #{{ str_pad($supplier->id, 5, '0', STR_PAD_LEFT) }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection