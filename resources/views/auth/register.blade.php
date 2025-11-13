@extends('layouts.landingpage')

@section('title', 'Register')

@section('content')
<section class="min-h-screen flex items-center justify-center gradient-bg py-16 px-4">
    <div class="container mx-auto max-w-6xl">
        <div class="flex flex-col lg:flex-row items-center justify-between gap-12">
            <!-- Left Content -->
            <div class="lg:w-1/2 text-center lg:text-left">
                <div class="inline-block mb-4">
                    <span class="bg-green-100 text-green-800 text-sm font-semibold px-4 py-2 rounded-full">Bergabung Bersama Kami</span>
                </div>
                <h1 class="text-4xl lg:text-5xl xl:text-6xl font-bold leading-tight mb-6">
                    Buat Akun
                    <span class="text-green-600 bg-gradient-to-r from-green-600 to-emerald-500 bg-clip-text text-transparent">Baru Anda</span>
                </h1>
                <p class="text-gray-600 text-lg mb-8 leading-relaxed max-w-lg">
                    Daftar sekarang dan mulai kelola inventory bisnis Anda dengan lebih efisien. Akses semua fitur lengkap untuk optimalkan pengelolaan stok barang.
                </p>

                <div class="space-y-6 max-w-md">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-1">Kelola Stok Otomatis</h3>
                            <p class="text-gray-600 text-sm">Sistem otomatis untuk memantau dan mengelola inventory Anda</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-1">Laporan Detail</h3>
                            <p class="text-gray-600 text-sm">Akses laporan lengkap untuk analisis bisnis yang lebih baik</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-1">Multi-user Support</h3>
                            <p class="text-gray-600 text-sm">Kelola akses tim dengan level permission yang berbeda</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Register Form -->
            <div class="lg:w-1/2 flex justify-center">
                <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-xl hover:shadow-2xl transition-all duration-300 w-full max-w-md">
                    <div class="text-center mb-8">
                        <div class="w-16 h-16 bg-gradient-to-r from-green-600 to-emerald-500 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                            </svg>
                        </div>
                        <h2 class="text-2xl lg:text-3xl font-bold text-gray-900">Daftar Akun</h2>
                        <p class="text-gray-600 mt-2">Isi data diri Anda untuk mulai bergabung</p>
                    </div>

                    <!-- Alert Messages -->
                    @if ($errors->any())
                    <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-6">
                        <div class="flex items-center gap-3 mb-2">
                            <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
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

                    <form method="POST" action="{{ route('register') }}" class="space-y-6">
                        @csrf

                        <div class="space-y-2">
                            <label for="name" class="block text-sm font-semibold text-gray-700">Nama Lengkap</label>
                            <div class="relative">
                                <input type="text" id="name" name="name"
                                    class="w-full border border-gray-300 rounded-xl py-3 px-4 pl-12 focus:border-green-600 focus:ring-2 focus:ring-green-200 transition duration-300 ease-in-out outline-none"
                                    placeholder="Masukkan nama lengkap"
                                    required
                                    value="{{ old('name') }}">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="email" class="block text-sm font-semibold text-gray-700">Email</label>
                            <div class="relative">
                                <input type="email" id="email" name="email"
                                    class="w-full border border-gray-300 rounded-xl py-3 px-4 pl-12 focus:border-green-600 focus:ring-2 focus:ring-green-200 transition duration-300 ease-in-out outline-none"
                                    placeholder="email@example.com"
                                    required
                                    value="{{ old('email') }}">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="password" class="block text-sm font-semibold text-gray-700">Password</label>
                            <div class="relative">
                                <input type="password" id="password" name="password"
                                    class="w-full border border-gray-300 rounded-xl py-3 px-4 pl-12 focus:border-green-600 focus:ring-2 focus:ring-green-200 transition duration-300 ease-in-out outline-none"
                                    placeholder="Buat password yang kuat"
                                    required>
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                    </svg>
                                </div>
                            </div>
                            <p class="text-xs text-gray-500 mt-1">Gunakan minimal 8 karakter dengan kombinasi huruf dan angka</p>
                        </div>

                        <div class="space-y-2">
                            <label for="password_confirmation" class="block text-sm font-semibold text-gray-700">Konfirmasi Password</label>
                            <div class="relative">
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="w-full border border-gray-300 rounded-xl py-3 px-4 pl-12 focus:border-green-600 focus:ring-2 focus:ring-green-200 transition duration-300 ease-in-out outline-none"
                                    placeholder="Ulangi password Anda"
                                    required>
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" id="terms" name="terms" class="w-4 h-4 text-green-600 border-gray-300 rounded focus:ring-green-500" required>
                            <label for="terms" class="ml-2 text-sm text-gray-600">
                                Saya menyetujui
                                <a href="#" class="text-green-600 hover:text-green-700 font-medium">Syarat & Ketentuan</a>
                                dan
                                <a href="#" class="text-green-600 hover:text-green-700 font-medium">Kebijakan Privasi</a>
                            </label>
                        </div>

                        <button type="submit"
                            class="w-full bg-gradient-to-r from-green-600 to-emerald-500 hover:from-green-700 hover:to-emerald-600 text-white font-semibold py-3 px-6 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                            </svg>
                            <span>Daftar Sekarang</span>
                        </button>
                    </form>

                    <div class="mt-8 pt-6 border-t border-gray-200 text-center">
                        <p class="text-gray-600 text-sm">
                            Sudah punya akun?
                            <a href="{{ route('login') }}" class="text-green-600 hover:text-green-700 font-semibold transition-colors duration-200 ml-1">
                                Masuk di sini
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
