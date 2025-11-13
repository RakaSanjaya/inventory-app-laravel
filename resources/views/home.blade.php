@extends('layouts.landingpage')

@section('title', 'Home')

@section('content')
    <section class="gradient-bg py-16 px-16 lg:py-24">
        <div class="container mx-auto px-4 flex flex-col lg:flex-row-reverse items-center justify-between gap-10">
            <div class="lg:w-1/2 flex justify-center">
                <div class="relative">
                    <div class="absolute -inset-4 bg-green-100 rounded-full blur-lg opacity-50"></div>
                    <img src="{{asset('inventory-worker.png')}}"
                        class="relative w-full max-w-md mx-auto transform hover:scale-105 transition duration-500"
                        alt="Inventory Management" />
                </div>
            </div>
            <div class="lg:w-1/2 text-center lg:text-left">
                <h1 class="text-3xl lg:text-5xl xl:text-6xl font-bold leading-tight mb-6">
                    Kelola Stok Lebih
                    <span
                        class="text-green-600 bg-gradient-to-r from-green-600 to-emerald-500 bg-clip-text text-transparent">Mudah
                        & Efisien</span>
                </h1>
                <p class="text-gray-600 text-lg mb-8 leading-relaxed">
                    Platform inventory digital yang membantu Anda mencatat, melacak, dan mengelola stok secara real-time
                    dengan fitur notifikasi, laporan detail, dan dashboard interaktif.
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
                    <a href="#features"
                        class="border border-green-600 text-green-600 hover:bg-green-50 font-semibold py-3 px-8 rounded-full transition duration-300 flex items-center justify-center gap-2">
                        <span>Pelajari Fitur</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </a>
                </div>
                <div class="mt-12 flex flex-wrap justify-center lg:justify-start gap-8 text-center">
                    <div class="flex flex-col items-center">
                        <div class="text-2xl font-bold text-green-600">99%</div>
                        <div class="text-gray-500 text-sm">Akurasi Stok</div>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="text-2xl font-bold text-green-600">24/7</div>
                        <div class="text-gray-500 text-sm">Monitoring</div>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="text-2xl font-bold text-green-600">100+</div>
                        <div class="text-gray-500 text-sm">Pengguna Aktif</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="features" class="py-16 px-16 lg:py-24 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <div class="inline-block mb-4">
                    <span class="bg-green-100 text-green-800 text-sm font-semibold px-4 py-2 rounded-full">Mengapa Memilih
                        Kami</span>
                </div>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Mengapa Harus Menggunakan <span
                        class="text-green-600">App Inventory?</span></h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">Solusi lengkap untuk mengoptimalkan pengelolaan
                    inventaris bisnis Anda dengan teknologi terkini</p>
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
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Pengelolaan Stok <span class="text-green-600">Lebih
                            Akurat</span></h3>
                    <p class="text-gray-600 leading-relaxed">
                        Pantau jumlah stok barang secara real-time dengan akurasi tinggi. Hindari kekurangan atau kelebihan
                        stok dengan sistem yang selalu update.
                    </p>
                </div>

                <div
                    class="card-hover bg-white p-8 rounded-2xl border border-gray-100 shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Meningkatkan <span class="text-green-600">Efisiensi
                            Operasional</span></h3>
                    <p class="text-gray-600 leading-relaxed">
                        Otomatiskan proses manual seperti pencatatan barang dan pembuatan laporan. Hemat waktu dan fokus
                        pada strategi bisnis yang lebih penting.
                    </p>
                </div>

                <div
                    class="card-hover bg-white p-8 rounded-2xl border border-gray-100 shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Notifikasi <span class="text-green-600">Stok
                            Barang</span></h3>
                    <p class="text-gray-600 leading-relaxed">
                        Dapatkan pemberitahuan otomatis ketika stok mendekati batas minimum. Lakukan pemesanan ulang tepat
                        waktu dan hindari kehabisan stok.
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
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Meningkatkan <span class="text-green-600">Transparansi
                            & Kontrol</span></h3>
                    <p class="text-gray-600 leading-relaxed">
                        Kontrol penuh dengan akses yang dapat disesuaikan untuk setiap pengguna. Tingkatkan transparansi dan
                        minimalkan potensi penyalahgunaan data.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 px-16 lg:py-24 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <div class="inline-block mb-4">
                    <span class="bg-green-100 text-green-800 text-sm font-semibold px-4 py-2 rounded-full">Fitur
                        Unggulan</span>
                </div>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Fitur Utama yang Dapat <span
                        class="text-green-600">Anda Temukan</span></h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">Berbagai fitur canggih yang dirancang untuk memudahkan
                    pengelolaan inventaris Anda</p>
            </div>

            <div class="flex flex-col lg:flex-row-reverse items-center justify-between gap-12">
                <div class="lg:w-1/2">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div
                            class="card-hover bg-white p-6 rounded-xl border border-gray-100 shadow-md hover:shadow-lg transition-all duration-300">
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">Dashboard <span
                                    class="text-green-600">Interaktif</span></h3>
                            <p class="text-gray-600 text-sm">
                                Data penting seperti barang masuk/keluar dan sisa stok ditampilkan dalam grafik yang mudah
                                dipahami.
                            </p>
                        </div>

                        <div
                            class="card-hover bg-white p-6 rounded-xl border border-gray-100 shadow-md hover:shadow-lg transition-all duration-300">
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">Navigasi <span
                                    class="text-green-600">Cepat</span></h3>
                            <p class="text-gray-600 text-sm">
                                Akses langsung ke menu utama seperti Tambah Barang dan Kelola Stok hanya dengan satu klik.
                            </p>
                        </div>

                        <div
                            class="card-hover bg-white p-6 rounded-xl border border-gray-100 shadow-md hover:shadow-lg transition-all duration-300">
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2"><span class="text-green-600">Notifikasi</span>
                                Penting</h3>
                            <p class="text-gray-600 text-sm">
                                Peringatan barang perlu restock atau mendekati tanggal kedaluwarsa untuk menjaga
                                ketersediaan stok.
                            </p>
                        </div>

                        <div
                            class="card-hover bg-white p-6 rounded-xl border border-gray-100 shadow-md hover:shadow-lg transition-all duration-300">
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">History <span class="text-green-600">Aktivitas
                                    Terbaru</span></h3>
                            <p class="text-gray-600 text-sm">
                                Daftar transaksi atau perubahan stok terakhir untuk mempermudah pemantauan aktivitas harian.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="lg:w-1/2 flex justify-center">
                    <div class="relative">
                        <div class="absolute -inset-4 bg-green-100 rounded-2xl blur-lg opacity-50"></div>
                        <img src="{{asset('inventory-worker.png')}}"
                            class="relative w-full max-w-md mx-auto transform hover:scale-105 transition duration-500"
                            alt="Fitur Inventory" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 px-16 lg:py-24 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <div class="inline-block mb-4">
                    <span class="bg-green-100 text-green-800 text-sm font-semibold px-4 py-2 rounded-full">Bantuan</span>
                </div>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4"><span class="text-green-600">FAQ</span> -
                    Pertanyaan yang Sering Ditanyakan</h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">Temukan jawaban untuk pertanyaan umum seputar sistem
                    inventory kami</p>
            </div>

            <div class="max-w-3xl mx-auto space-y-4">
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                    <button
                        class="w-full flex justify-between items-center p-6 text-left text-gray-900 font-semibold hover:bg-gray-50 transition duration-200"
                        id="faq1-btn">
                        <span>Apa itu sistem inventory barang?</span>
                        <svg class="w-5 h-5 text-green-600 transition-transform duration-300" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div id="faq1-content" class="hidden px-6 pb-6 text-gray-600 border-t border-gray-100">
                        <p class="pt-4">
                            Sistem inventory barang adalah sebuah aplikasi atau platform yang digunakan untuk memantau,
                            mengelola, dan mengatur persediaan barang dalam suatu organisasi atau perusahaan.
                            Sistem ini membantu memastikan barang tersedia dengan cukup dan terkelola dengan baik.
                        </p>
                    </div>
                </div>

                <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                    <button
                        class="w-full flex justify-between items-center p-6 text-left text-gray-900 font-semibold hover:bg-gray-50 transition duration-200"
                        id="faq2-btn">
                        <span>Apa keunggulan utama dari sistem inventory barang ini?</span>
                        <svg class="w-5 h-5 text-green-600 transition-transform duration-300" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div id="faq2-content" class="hidden px-6 pb-6 text-gray-600 border-t border-gray-100">
                        <p class="pt-4">
                            Sistem inventory barang kami memiliki keunggulan utama seperti pengelolaan persediaan secara
                            real-time, kemudahan akses melalui berbagai perangkat,
                            pemberitahuan otomatis saat stok rendah, dan laporan terperinci.
                        </p>
                    </div>
                </div>

                <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                    <button
                        class="w-full flex justify-between items-center p-6 text-left text-gray-900 font-semibold hover:bg-gray-50 transition duration-200"
                        id="faq3-btn">
                        <span>Apakah saya bisa mengakses sistem dari perangkat lain?</span>
                        <svg class="w-5 h-5 text-green-600 transition-transform duration-300" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div id="faq3-content" class="hidden px-6 pb-6 text-gray-600 border-t border-gray-100">
                        <p class="pt-4">
                            Ya, sistem ini dapat diakses dari berbagai perangkat yang terhubung ke internet, seperti laptop,
                            komputer, atau ponsel pintar.
                            Cukup masuk dengan akun Anda untuk mengelola inventory barang di mana saja.
                        </p>
                    </div>
                </div>

                <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                    <button
                        class="w-full flex justify-between items-center p-6 text-left text-gray-900 font-semibold hover:bg-gray-50 transition duration-200"
                        id="faq4-btn">
                        <span>Bagaimana cara sistem ini membantu menghemat waktu dan tenaga?</span>
                        <svg class="w-5 h-5 text-green-600 transition-transform duration-300" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div id="faq4-content" class="hidden px-6 pb-6 text-gray-600 border-t border-gray-100">
                        <p class="pt-4">
                            Sistem ini menghemat waktu dan tenaga dengan mengotomatiskan pencatatan barang, pemantauan stok,
                            dan pembuatan laporan,
                            sehingga mengurangi tugas manual dan mengurangi kemungkinan kesalahan manusia.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12  px-16 bg-gradient-to-r from-green-600 to-emerald-500 text-white">
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

    @section('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var faqs = [
                    { btn: '#faq1-btn', content: '#faq1-content' },
                    { btn: '#faq2-btn', content: '#faq2-content' },
                    { btn: '#faq3-btn', content: '#faq3-content' },
                    { btn: '#faq4-btn', content: '#faq4-content' }
                ];

                faqs.forEach(function (f) {
                    var btn = document.querySelector(f.btn);
                    var content = document.querySelector(f.content);
                    if (!btn || !content) return;

                    // Pastikan konten tersembunyi awalnya dengan class "hidden"
                    btn.addEventListener('click', function () {
                        var isHidden = content.classList.toggle('hidden');
                        // fallback style toggle kalau perlu animasi sederhana
                        if (isHidden) {
                            content.style.display = 'none';
                        } else {
                            content.style.display = 'block';
                        }
                        var svg = btn.querySelector('svg');
                        if (svg) svg.classList.toggle('rotate-180');
                    });
                });

                // Smooth scrolling for anchor links
                document.querySelectorAll('a[href^="#"]').forEach(function (link) {
                    link.addEventListener('click', function (e) {
                        var href = this.getAttribute('href');
                        if (!href || href === '#') return;
                        var target = document.querySelector(href);
                        if (target) {
                            e.preventDefault();
                            var offset = 80;
                            var top = target.getBoundingClientRect().top + window.pageYOffset - offset;
                            window.scrollTo({ top: top, behavior: 'smooth' });
                        }
                    });
                });
            });
        </script>
    @endsection

@endsection