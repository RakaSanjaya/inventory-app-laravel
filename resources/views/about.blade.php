@extends('layouts.landingpage')

@section('title', 'About')

@section('content')
    <section class="gradient-bg py-16 px-16 lg:py-24">
        <div class="container mx-auto px-4 flex flex-col lg:flex-row items-center justify-between gap-10">
            <div class="lg:w-1/2 flex justify-center">
                <div class="relative">
                    <div class="absolute -inset-4 bg-green-100 rounded-full blur-lg opacity-50"></div>
                    <img src="{{asset('inventory-worker.png')}}"
                        class="relative w-full max-w-md mx-auto transform hover:scale-105 transition duration-500"
                        alt="About Inventory App" />
                </div>
            </div>
            <div class="lg:w-1/2 text-center lg:text-left">
                <div class="inline-block mb-4">
                    <span class="bg-green-100 text-green-800 text-sm font-semibold px-4 py-2 rounded-full">Tentang Kami</span>
                </div>
                <h1 class="text-3xl lg:text-5xl xl:text-6xl font-bold leading-tight mb-6">
                    Tentang
                    <span
                        class="text-green-600 bg-gradient-to-r from-green-600 to-emerald-500 bg-clip-text text-transparent">Inventory App</span>
                </h1>
                <p class="text-gray-600 text-lg mb-8 leading-relaxed">
                    Inventory App adalah platform digital yang dirancang untuk membantu pelaku usaha dalam mengelola stok barang secara efisien dan akurat. Kami menyediakan alat yang mudah digunakan untuk melacak inventaris, memantau penjualan, dan memprediksi kebutuhan stok.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                    <a href="{{ route('login') }}"
                        class="bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-8 rounded-full transition duration-300 transform hover:scale-105 shadow-lg flex items-center justify-center gap-2">
                        <span>Mulai Sekarang</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                    <a href="#vision-mission"
                        class="border border-green-600 text-green-600 hover:bg-green-50 font-semibold py-3 px-8 rounded-full transition duration-300 flex items-center justify-center gap-2">
                        <span>Pelajari Lebih Lanjut</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="vision-mission" class="py-16 px-16 lg:py-24 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <div class="inline-block mb-4">
                    <span class="bg-green-100 text-green-800 text-sm font-semibold px-4 py-2 rounded-full">Visi & Misi</span>
                </div>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Visi & Misi <span
                        class="text-green-600">Kami</span></h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">Menjadi solusi terdepan dalam pengelolaan inventaris untuk bisnis di Indonesia</p>
            </div>

            <div class="flex flex-col lg:flex-row gap-12 items-center">
                <div class="lg:w-1/2">
                    <div class="grid grid-cols-1 gap-8">
                        <div
                            class="card-hover bg-white p-8 rounded-2xl border border-gray-100 shadow-lg hover:shadow-xl transition-all duration-300">
                            <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center mb-6">
                                <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-4">Visi <span class="text-green-600">Kami</span></h3>
                            <p class="text-gray-600 leading-relaxed">
                                Menjadi platform terpercaya untuk pengelolaan inventaris di Indonesia, membantu bisnis dari berbagai skala untuk meningkatkan efisiensi dan akurasi dalam manajemen stok mereka. Dengan fitur-fitur inovatif, kami ingin menciptakan solusi manajemen inventaris yang dapat diakses oleh semua kalangan.
                            </p>
                        </div>

                        <div
                            class="card-hover bg-white p-8 rounded-2xl border border-gray-100 shadow-lg hover:shadow-xl transition-all duration-300">
                            <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center mb-6">
                                <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-4">Misi <span class="text-green-600">Kami</span></h3>
                            <p class="text-gray-600 leading-relaxed">
                                Misi kami adalah menyediakan alat dan solusi yang memudahkan pengelolaan inventaris untuk bisnis. Dengan memanfaatkan teknologi terkini, kami berkomitmen untuk membantu bisnis meningkatkan produktivitas, mengurangi kesalahan, dan memastikan ketersediaan stok yang optimal.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="lg:w-1/2">
                    <div class="bg-gradient-to-br from-green-50 to-emerald-50 p-8 rounded-2xl border border-green-100">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6 text-center">Nilai-Nilai Perusahaan</h3>
                        <div class="space-y-6">
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Inovasi Terus Menerus</h4>
                                    <p class="text-gray-600 text-sm">Selalu mengembangkan fitur dan teknologi terbaru untuk memenuhi kebutuhan pengguna</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Keamanan Data</h4>
                                    <p class="text-gray-600 text-sm">Prioritas utama kami adalah melindungi data dan informasi bisnis Anda</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Dukungan Pelanggan</h4>
                                    <p class="text-gray-600 text-sm">Tim support kami siap membantu 24/7 untuk memastikan kelancaran operasional Anda</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 px-16 lg:py-24 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <div class="inline-block mb-4">
                    <span class="bg-green-100 text-green-800 text-sm font-semibold px-4 py-2 rounded-full">Mengapa Memilih Kami</span>
                </div>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Mengapa Harus <span
                        class="text-green-600">Inventory App?</span></h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">Berbagai keunggulan yang membuat kami menjadi pilihan terbaik untuk pengelolaan inventaris Anda</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8">
                <div
                    class="card-hover bg-white p-8 rounded-2xl border border-gray-100 shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Akurasi Tinggi dengan <span class="text-green-600">Teknologi AI</span></h3>
                    <p class="text-gray-600 leading-relaxed">
                        Inventory App menggunakan teknologi AI canggih untuk memantau stok barang secara real-time, mengurangi kemungkinan kesalahan manusia, dan memberikan prediksi kebutuhan stok secara akurat.
                    </p>
                </div>

                <div
                    class="card-hover bg-white p-8 rounded-2xl border border-gray-100 shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Mudah Diintegrasikan <span class="text-green-600">ke Sistem Lain</span></h3>
                    <p class="text-gray-600 leading-relaxed">
                        Solusi kami dirancang agar mudah diintegrasikan dengan perangkat lunak lain seperti POS (Point of Sale) dan ERP (Enterprise Resource Planning) untuk pengalaman yang lebih seamless.
                    </p>
                </div>

                <div
                    class="card-hover bg-white p-8 rounded-2xl border border-gray-100 shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Keamanan Data yang <span class="text-green-600">Terjamin</span></h3>
                    <p class="text-gray-600 leading-relaxed">
                        Kami memahami pentingnya data bisnis Anda. Oleh karena itu, kami menggunakan protokol keamanan tingkat tinggi untuk melindungi semua data inventaris Anda.
                    </p>
                </div>

                <div
                    class="card-hover bg-white p-8 rounded-2xl border border-gray-100 shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Gratis dan <span class="text-green-600">Mudah Digunakan</span></h3>
                    <p class="text-gray-600 leading-relaxed">
                        Inventory App menyediakan opsi gratis untuk pengguna, lengkap dengan antarmuka yang user-friendly, sehingga dapat digunakan oleh siapa saja tanpa pelatihan khusus.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 px-16 lg:py-24 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <div class="inline-block mb-4">
                    <span class="bg-green-100 text-green-800 text-sm font-semibold px-4 py-2 rounded-full">Tim Kami</span>
                </div>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Bertemu dengan <span
                        class="text-green-600">Tim di Balik Layar</span></h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">Tim profesional yang berdedikasi untuk menghadirkan solusi inventory terbaik untuk bisnis Anda</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="w-24 h-24 bg-green-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <svg class="w-12 h-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Product Manager</h3>
                    <p class="text-gray-600 text-sm">Mengembangkan fitur yang sesuai dengan kebutuhan pengguna</p>
                </div>

                <div class="text-center">
                    <div class="w-24 h-24 bg-green-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <svg class="w-12 h-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Developer Team</h3>
                    <p class="text-gray-600 text-sm">Membangun sistem yang stabil dan mudah digunakan</p>
                </div>

                <div class="text-center">
                    <div class="w-24 h-24 bg-green-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <svg class="w-12 h-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Support Team</h3>
                    <p class="text-gray-600 text-sm">Siap membantu Anda 24/7 dengan senang hati</p>
                </div>

                <div class="text-center">
                    <div class="w-24 h-24 bg-green-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <svg class="w-12 h-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">QA Team</h3>
                    <p class="text-gray-600 text-sm">Memastikan kualitas sistem selalu terjaga</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 px-16 bg-gradient-to-r from-green-600 to-emerald-500 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-2xl lg:text-3xl font-bold mb-4">Siap Mengoptimalkan Pengelolaan Inventory Anda?</h2>
            <p class="text-green-100 mb-8 max-w-2xl mx-auto">Bergabung dengan ratusan bisnis yang telah mempercayai sistem
                kami untuk mengelola stok mereka</p>
            <a href="{{ route('login') }}"
                class="inline-block bg-white text-green-600 hover:bg-gray-100 font-semibold py-3 px-8 rounded-full transition duration-300 transform hover:scale-105 shadow-lg">
                Mulai Sekarang - Gratis
            </a>
        </div>
    </section>
@endsection
