@extends('layouts.landingpage')

@section('title', 'Login')

@section('content')
<section class="min-h-screen flex items-center justify-center gradient-bg py-16 px-4">
    <div class="container mx-auto max-w-6xl">
        <div class="flex flex-col lg:flex-row items-center justify-between gap-12">
            <!-- Left Content -->
            <div class="lg:w-1/2 text-center lg:text-left">
                <div class="inline-block mb-4">
                    <span class="bg-green-100 text-green-800 text-sm font-semibold px-4 py-2 rounded-full">Selamat Datang Kembali</span>
                </div>
                <h1 class="text-4xl lg:text-5xl xl:text-6xl font-bold leading-tight mb-6">
                    Masuk ke
                    <span class="text-green-600 bg-gradient-to-r from-green-600 to-emerald-500 bg-clip-text text-transparent">Akun Anda</span>
                </h1>
                <p class="text-gray-600 text-lg mb-8 leading-relaxed max-w-lg">
                    Akses dashboard inventory Anda dan kelola stok barang dengan lebih efisien. Masuk untuk melanjutkan pengelolaan bisnis Anda.
                </p>

                <div class="space-y-6 max-w-md">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-1">Kelola Stok dengan Mudah</h3>
                            <p class="text-gray-600 text-sm">Pantau dan kelola inventory bisnis Anda dalam satu platform</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-1">Akses Cepat & Real-time</h3>
                            <p class="text-gray-600 text-sm">Data inventory terupdate secara real-time untuk keputusan yang tepat</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-1">Keamanan Terjamin</h3>
                            <p class="text-gray-600 text-sm">Data bisnis Anda dilindungi dengan sistem keamanan terbaik</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Login Form -->
            <div class="lg:w-1/2 flex justify-center">
                <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-xl hover:shadow-2xl transition-all duration-300 w-full max-w-md">
                    <div class="text-center mb-8">
                        <div class="w-16 h-16 bg-gradient-to-r from-green-600 to-emerald-500 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <h2 class="text-2xl lg:text-3xl font-bold text-gray-900">Masuk</h2>
                        <p class="text-gray-600 mt-2">Masuk ke akun inventory Anda</p>
                    </div>

                    <!-- Alert Messages -->
                    @if (session('success'))
                    <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl mb-6 flex items-center gap-3">
                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                    @endif

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

                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf

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
                                    placeholder="Masukkan password"
                                    required>
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <label class="flex items-center">
                                <input type="checkbox" name="remember" class="w-4 h-4 text-green-600 border-gray-300 rounded focus:ring-green-500">
                                <span class="ml-2 text-sm text-gray-600">Ingat saya</span>
                            </label>
                            <a href="" class="text-sm text-green-600 hover:text-green-700 font-medium transition-colors duration-200">
                                Lupa password?
                            </a>
                        </div>

                        <button type="submit"
                            class="w-full bg-gradient-to-r from-green-600 to-emerald-500 hover:from-green-700 hover:to-emerald-600 text-white font-semibold py-3 px-6 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                            </svg>
                            <span>Masuk</span>
                        </button>
                    </form>

                    <div class="mt-8 pt-6 border-t border-gray-200 text-center">
                        <p class="text-gray-600 text-sm">
                            Belum punya akun?
                            <a href="{{ route('register') }}" class="text-green-600 hover:text-green-700 font-semibold transition-colors duration-200 ml-1">
                                Daftar di sini
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
