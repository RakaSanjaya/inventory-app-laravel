@extends('layouts.landingpage')

@section('title', 'Contact')

@section('content')
    <section class="gradient-bg py-16 px-16 lg:py-24">
        <div class="container mx-auto px-4 flex flex-col lg:flex-row items-center justify-between gap-10">
            <div class="lg:w-1/2 text-center lg:text-left">
                <div class="inline-block mb-4">
                    <span class="bg-green-100 text-green-800 text-sm font-semibold px-4 py-2 rounded-full">Hubungi Kami</span>
                </div>
                <h1 class="text-3xl lg:text-5xl xl:text-6xl font-bold leading-tight mb-6">
                    Hubungi
                    <span
                        class="text-green-600 bg-gradient-to-r from-green-600 to-emerald-500 bg-clip-text text-transparent">Tim Kami</span>
                </h1>
                <p class="text-gray-600 text-lg mb-8 leading-relaxed">
                    Inventory Anda adalah prioritas kami. Jangan ragu untuk menghubungi kami jika Anda memiliki pertanyaan tentang pengelolaan stok, pelacakan inventaris, atau optimasi sistem inventaris Anda.
                </p>
                <div class="flex flex-wrap gap-8 text-center lg:text-left">
                    <div class="flex flex-col items-center lg:items-start">
                        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center mb-3">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <h3 class="font-semibold text-gray-900 mb-1">Alamat</h3>
                        <p class="text-gray-600 text-sm">Kota Malang, Jawa Timur, Indonesia</p>
                    </div>
                    <div class="flex flex-col items-center lg:items-start">
                        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center mb-3">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                        </div>
                        <h3 class="font-semibold text-gray-900 mb-1">Telepon</h3>
                        <p class="text-gray-600 text-sm">0812 3456 7890</p>
                    </div>
                    <div class="flex flex-col items-center lg:items-start">
                        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center mb-3">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h3 class="font-semibold text-gray-900 mb-1">Email</h3>
                        <p class="text-gray-600 text-sm">support@inventoryapp.com</p>
                    </div>
                </div>
            </div>
            <div class="lg:w-1/2 flex justify-center">
                <div class="relative">
                    <div class="absolute -inset-4 bg-green-100 rounded-full blur-lg opacity-50"></div>
                    <img src="{{asset('inventory-worker.png')}}"
                        class="relative w-full max-w-md mx-auto transform hover:scale-105 transition duration-500"
                        alt="Contact Inventory App" />
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 px-16 lg:py-24 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <div class="inline-block mb-4">
                    <span class="bg-green-100 text-green-800 text-sm font-semibold px-4 py-2 rounded-full">Lokasi Kami</span>
                </div>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Kunjungi <span
                        class="text-green-600">Kantor Kami</span></h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">Kami berada di jantung Kota Malang, siap melayani kebutuhan inventory bisnis Anda</p>
            </div>

            <div class="rounded-2xl overflow-hidden shadow-xl border border-gray-100">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63219.14214529117!2d112.5905833304482!3d-7.978643313838005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd62822063dc2fb%3A0x78879446481a4da2!2sMalang%2C%20Kota%20Malang%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1730450501308!5m2!1sid!2sid"
                    width="100%" height="450" class="w-full filter brightness-90" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>

    <section class="py-16 px-16 lg:py-24 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-12 items-start">
                <div class="lg:w-1/2">
                    <div class="text-center lg:text-left mb-8">
                        <div class="inline-block mb-4">
                            <span class="bg-green-100 text-green-800 text-sm font-semibold px-4 py-2 rounded-full">Form Kontak</span>
                        </div>
                        <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">Kirim <span
                                class="text-green-600">Pesan</span></h2>
                        <p class="text-gray-600 text-lg">
                            Tim support kami siap membantu menjawab pertanyaan dan memberikan solusi terbaik untuk kebutuhan inventory bisnis Anda.
                        </p>
                    </div>

                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-1">Waktu Respon Cepat</h3>
                                <p class="text-gray-600 text-sm">Kami merespon pesan dalam waktu 1-2 jam kerja</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-1">Solusi Terjamin</h3>
                                <p class="text-gray-600 text-sm">Tim ahli kami memberikan solusi yang tepat untuk masalah Anda</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-1">Support 24/7</h3>
                                <p class="text-gray-600 text-sm">Layanan pelanggan tersedia kapan saja Anda butuhkan</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:w-1/2">
                    <form name="form-contact" action="" method="POST"
                        class="bg-white p-8 rounded-2xl border border-gray-100 shadow-lg hover:shadow-xl transition-all duration-300"
                        autocomplete="off">
                        @csrf
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Isi Formulir Kontak</h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div class="flex flex-col">
                                <label for="name" class="text-gray-700 font-medium mb-2">Nama Lengkap</label>
                                <input type="text" name="name" id="name" placeholder="Nama Lengkap Anda"
                                    class="text-sm border border-gray-300 rounded-xl py-3 px-4 focus:border-green-600 focus:ring-2 focus:ring-green-200 transition duration-300 ease-in-out outline-none"
                                    required>
                                @error('name')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="flex flex-col">
                                <label for="email" class="text-gray-700 font-medium mb-2">Email</label>
                                <input type="email" name="email" id="email" placeholder="Alamat Email"
                                    class="text-sm border border-gray-300 rounded-xl py-3 px-4 focus:border-green-600 focus:ring-2 focus:ring-green-200 transition duration-300 ease-in-out outline-none"
                                    required>
                                @error('email')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div class="flex flex-col">
                                <label for="tel" class="text-gray-700 font-medium mb-2">No Telepon</label>
                                <input type="tel" name="phone" id="tel" placeholder="Nomor Telepon Anda"
                                    class="text-sm border border-gray-300 rounded-xl py-3 px-4 focus:border-green-600 focus:ring-2 focus:ring-green-200 transition duration-300 ease-in-out outline-none"
                                    required>
                                @error('phone')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="flex flex-col">
                                <label for="subject" class="text-gray-700 font-medium mb-2">Subject</label>
                                <input type="text" name="subject" id="subject" placeholder="Subject Pesan Anda"
                                    class="text-sm border border-gray-300 rounded-xl py-3 px-4 focus:border-green-600 focus:ring-2 focus:ring-green-200 transition duration-300 ease-in-out outline-none"
                                    required>
                                @error('subject')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="flex flex-col mb-6">
                            <label for="message" class="text-gray-700 font-medium mb-2">Message</label>
                            <textarea name="message" id="message" rows="4" placeholder="Tulis pesan Anda di sini..."
                                class="text-sm border border-gray-300 rounded-xl py-3 px-4 focus:border-green-600 focus:ring-2 focus:ring-green-200 transition duration-300 ease-in-out outline-none resize-none"
                                required></textarea>
                            @error('message')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" name="send" id="send"
                            class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-8 rounded-xl transition duration-300 transform hover:scale-105 shadow-lg flex items-center justify-center gap-2">
                            <span>Kirim Pesan</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 px-16 bg-gradient-to-r from-green-600 to-emerald-500 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-2xl lg:text-3xl font-bold mb-4">Butuh Bantuan Cepat?</h2>
            <p class="text-green-100 mb-8 max-w-2xl mx-auto">Tim support kami siap membantu Anda kapan saja. Hubungi kami untuk konsultasi gratis tentang pengelolaan inventory bisnis Anda.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="tel:081234567890"
                    class="inline-flex items-center gap-2 bg-white text-green-600 hover:bg-gray-100 font-semibold py-3 px-8 rounded-full transition duration-300 transform hover:scale-105 shadow-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                    <span>Telepon Sekarang</span>
                </a>
                <a href="mailto:support@inventoryapp.com"
                    class="inline-flex items-center gap-2 border border-white text-white hover:bg-white hover:text-green-600 font-semibold py-3 px-8 rounded-full transition duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    <span>Email Kami</span>
                </a>
            </div>
        </div>
    </section>
@endsection 
