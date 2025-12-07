    @extends('layouts.app')

    @section('title', 'Buat Order Baru')

    @section('content')
        <div class="min-h-screen bg-gray-50 py-8">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Header Section -->
                <div class="mb-8">
                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                        <div>
                            <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-2">Transaksi Order Baru</h1>
                            <p class="text-gray-600 text-lg">Buat transaksi penjualan baru dengan mudah</p>
                        </div>
                        <div class="mt-4 lg:mt-0">
                            <button id="reset-cart"
                                class="inline-flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                    </path>
                                </svg>
                                <span>Kosongkan Keranjang</span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Product Search Section -->
                    <div class="lg:col-span-2">
                        <div class="bg-white rounded-2xl border border-gray-100 shadow-lg overflow-hidden mb-6">
                            <div class="bg-gradient-to-r from-green-600 to-emerald-500 px-6 py-4">
                                <h2 class="text-xl font-bold text-white flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                    Pencarian Produk
                                </h2>
                            </div>
                            <div class="p-6">
                                <!-- Search Form -->
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                                    <div class="md:col-span-2">
                                        <label for="product-search" class="block text-sm font-medium text-gray-700 mb-2">Cari
                                            Produk</label>
                                        <div class="relative">
                                            <input type="text" id="product-search"
                                                class="w-full border border-gray-300 rounded-xl py-3 px-4 focus:border-green-600 focus:ring-2 focus:ring-green-200 outline-none transition duration-300"
                                                placeholder="Cari berdasarkan nama atau SKU produk...">
                                            <svg class="absolute right-3 top-3 w-5 h-5 text-gray-400" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="category-filter"
                                            class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                                        <select id="category-filter"
                                            class="w-full border border-gray-300 rounded-xl py-3 px-3 focus:border-green-600 focus:ring-2 focus:ring-green-200 outline-none transition duration-300">
                                            <option value="">Semua Kategori</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category }}">{{ $category }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Product Grid -->
                                <div id="product-list" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                    @foreach($products as $product)
                                        <div class="product-item bg-white border border-gray-200 rounded-2xl p-4 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1"
                                            data-category="{{ $product->category }}">
                                            <div class="product-card cursor-pointer" data-product-id="{{ $product->id }}">
                                                <div class="flex justify-between items-start mb-3">
                                                    <h3 class="font-semibold text-gray-900 text-lg">{{ $product->name }}</h3>
                                                    <span
                                                        class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">{{ $product->category }}</span>
                                                </div>
                                                <div class="space-y-2">
                                                    <p class="text-sm text-gray-600">SKU: {{ $product->sku }}</p>
                                                    <p class="text-xl font-bold text-green-600">Rp
                                                        {{ number_format($product->price, 0, ',', '.') }}
                                                    </p>
                                                    <div class="flex justify-between items-center">
                                                        <span class="text-sm text-gray-600">
                                                            Stok: <span
                                                                class="{{ $product->stock < 10 ? 'text-red-600 font-bold' : 'text-green-600' }}">{{ $product->stock }}</span>
                                                        </span>
                                                        <button
                                                            class="add-to-cart bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-xl transition-colors duration-200 flex items-center gap-2"
                                                            data-product-id="{{ $product->id }}"
                                                            data-product-name="{{ $product->name }}"
                                                            data-product-price="{{ $product->price }}"
                                                            data-product-stock="{{ $product->stock }}" {{ $product->stock < 1 ? 'disabled' : '' }}>
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                                viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                                            </svg>
                                                            Tambah
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <!-- Loading and Empty States -->
                                <div id="loading-products" class="text-center py-8 hidden">
                                    <div class="inline-flex items-center justify-center">
                                        <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-green-600"></div>
                                        <span class="ml-3 text-gray-600">Memuat produk...</span>
                                    </div>
                                </div>

                                <div id="no-products" class="text-center py-8 hidden">
                                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                        </path>
                                    </svg>
                                    <p class="text-gray-500 text-lg">Tidak ada produk yang ditemukan.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order Form Section -->
                    <div class="lg:col-span-1">
                        <div class="bg-white rounded-2xl border border-gray-100 shadow-lg overflow-hidden sticky top-8">
                            <div class="bg-gradient-to-r from-green-600 to-emerald-500 px-6 py-4">
                                <h2 class="text-xl font-bold text-white flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                        </path>
                                    </svg>
                                    Keranjang Belanja
                                </h2>
                            </div>

                            <form id="order-form" action="{{ route('orders.store') }}" method="POST" class="p-6">
                                @csrf

                                <!-- Cashier and Customer Info -->
                                <div class="space-y-4 mb-6">
                                    <div>
                                        <label for="cashier_name" class="block text-sm font-medium text-gray-700 mb-2">Nama
                                            Kasir <span class="text-red-500">*</span></label>
                                        <input type="text" id="cashier_name" name="cashier_name" required
                                            class="w-full border border-gray-300 rounded-xl py-3 px-4 focus:border-green-600 focus:ring-2 focus:ring-green-200 outline-none transition duration-300"
                                            value="{{ auth()->user()->name ?? '' }}">
                                    </div>
                                    <div>
                                        <label for="customer_name" class="block text-sm font-medium text-gray-700 mb-2">Nama
                                            Pelanggan</label>
                                        <input type="text" id="customer_name" name="customer_name"
                                            class="w-full border border-gray-300 rounded-xl py-3 px-4 focus:border-green-600 focus:ring-2 focus:ring-green-200 outline-none transition duration-300"
                                            placeholder="Nama pelanggan (opsional)">
                                    </div>
                                </div>

                                <!-- Cart Items -->
                                <div class="mb-6">
                                    <label class="block text-sm font-medium text-gray-700 mb-3">Items dalam Keranjang</label>
                                    <div id="cart-items" class="space-y-3 max-h-64 overflow-y-auto">
                                        <div class="text-center py-8 text-gray-500">
                                            <svg class="w-12 h-12 mx-auto mb-3 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                                </path>
                                            </svg>
                                            <p>Belum ada item dalam keranjang</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Payment Summary -->
                                <div class="border-t border-gray-200 pt-4 space-y-3">
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600">Subtotal:</span>
                                        <span id="subtotal" class="font-semibold">Rp 0</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600">Pajak (10%):</span>
                                        <span id="tax" class="font-semibold">Rp 0</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600">Biaya Pengiriman:</span>
                                        <div class="w-32">
                                            <input type="number" id="shipping" name="shipping" value="0" min="0"
                                                class="w-full border border-gray-300 rounded-lg py-2 px-3 text-right focus:border-green-600 focus:ring-1 focus:ring-green-200 outline-none transition duration-300">
                                        </div>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600">Diskon:</span>
                                        <div class="w-32">
                                            <input type="number" id="discount" name="discount" value="0" min="0"
                                                class="w-full border border-gray-300 rounded-lg py-2 px-3 text-right focus:border-green-600 focus:ring-1 focus:ring-green-200 outline-none transition duration-300">
                                        </div>
                                    </div>
                                    <div class="flex justify-between items-center border-t border-gray-200 pt-3">
                                        <span class="text-lg font-bold text-gray-900">Total:</span>
                                        <span id="total-amount" class="text-xl font-bold text-green-600">Rp 0</span>
                                    </div>
                                </div>

                                <!-- Payment Method -->
                                <div class="mt-6">
                                    <label for="payment_method" class="block text-sm font-medium text-gray-700 mb-2">Metode
                                        Pembayaran <span class="text-red-500">*</span></label>
                                    <select id="payment_method" name="payment_method" required
                                        class="w-full border border-gray-300 rounded-xl py-3 px-3 focus:border-green-600 focus:ring-2 focus:ring-green-200 outline-none transition duration-300">
                                        <option value="cash">Tunai</option>
                                        <option value="debit">Kartu Debit</option>
                                        <option value="credit">Kartu Kredit</option>
                                        <option value="qris">QRIS</option>
                                        <option value="ewallet">E-Wallet</option>
                                        <option value="transfer">Transfer</option>
                                    </select>
                                </div>

                                <!-- Cash Paid -->
                                <div class="mt-6">
                                    <label for="cash_paid" class="block text-sm font-medium text-gray-700 mb-2">Uang Dibayar
                                        <span class="text-red-500">*</span></label>
                                    <input type="number" id="cash_paid" name="cash_paid" value="0" min="0" required
                                        class="w-full border border-gray-300 rounded-xl py-3 px-4 focus:border-green-600 focus:ring-2 focus:ring-green-200 outline-none transition duration-300">
                                </div>

                                <!-- Change Amount -->
                                <div class="mt-6 p-4 bg-gray-50 rounded-xl">
                                    <div class="flex justify-between items-center">
                                        <span class="text-lg font-bold text-gray-900">Kembalian:</span>
                                        <span id="change-amount" class="text-xl font-bold text-green-600">Rp 0</span>
                                    </div>
                                </div>

                                <!-- Notes -->
                                <div class="mt-6">
                                    <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">Catatan</label>
                                    <textarea id="notes" name="notes" rows="3"
                                        class="w-full border border-gray-300 rounded-xl py-3 px-4 focus:border-green-600 focus:ring-2 focus:ring-green-200 outline-none transition duration-300"
                                        placeholder="Catatan untuk order..."></textarea>
                                </div>

                                <!-- Submit Button -->
                                <div class="mt-6">
                                    <button type="button" id="show-confirmation"
                                        class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-4 px-6 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg flex items-center justify-center gap-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        Proses Order
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Quantity Modal -->
        <div id="edit-quantity-modal"
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50 hidden">
            <div class="bg-white rounded-2xl p-6 w-full max-w-md">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold text-gray-900">Edit Jumlah Produk</h3>
                    <button type="button" id="close-modal" class="text-gray-400 hover:text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                    </button>
                </div>
                <div class="space-y-4">
                    <input type="hidden" id="edit-product-id">
                    <div>
                        <label for="edit-quantity" class="block text-sm font-medium text-gray-700 mb-2">Jumlah</label>
                        <input type="number" id="edit-quantity" min="1" value="1"
                            class="w-full border border-gray-300 rounded-xl py-3 px-4 focus:border-green-600 focus:ring-2 focus:ring-green-200 outline-none transition duration-300">
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Stok tersedia: <span id="edit-stock-available"
                                class="font-semibold">0</span></p>
                    </div>
                    <div class="flex gap-3 pt-4">
                        <button type="button" id="cancel-edit"
                            class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-800 font-semibold py-3 px-4 rounded-xl transition-colors duration-200">
                            Batal
                        </button>
                        <button type="button" id="save-quantity"
                            class="flex-1 bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-4 rounded-xl transition-colors duration-200">
                            Simpan
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Order Confirmation Modal -->
        <div id="order-confirmation-modal"
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50 hidden">
            <div class="bg-white rounded-2xl w-full max-w-2xl max-h-[90vh] overflow-hidden">
                <div class="bg-gradient-to-r from-green-600 to-emerald-500 px-6 py-4">
                    <h3 class="text-xl font-bold text-white flex items-center gap-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Konfirmasi Order
                    </h3>
                </div>
                <div class="p-6 max-h-[60vh] overflow-y-auto">
                    <!-- Order Details -->
                    <div class="grid grid-cols-2 gap-6 mb-6">
                        <div>
                            <h4 class="font-semibold text-gray-900 mb-2">Informasi Kasir & Pelanggan</h4>
                            <div class="space-y-2">
                                <p><span class="font-medium">Kasir:</span> <span id="confirm-cashier">-</span></p>
                                <p><span class="font-medium">Pelanggan:</span> <span id="confirm-customer">-</span></p>
                            </div>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900 mb-2">Informasi Pembayaran</h4>
                            <div class="space-y-2">
                                <p><span class="font-medium">Metode:</span> <span id="confirm-payment-method">-</span></p>
                                <p><span class="font-medium">Uang Dibayar:</span> <span id="confirm-cash-paid">Rp 0</span></p>
                                <p><span class="font-medium">Kembalian:</span> <span id="confirm-change">Rp 0</span></p>
                            </div>
                        </div>
                    </div>

                    <!-- Items List -->
                    <h4 class="font-semibold text-gray-900 mb-3">Items dalam Order</h4>
                    <div id="confirm-items" class="space-y-3 mb-6">
                        <!-- Items will be populated by JavaScript -->
                    </div>

                    <!-- Summary -->
                    <div class="border-t border-gray-200 pt-4 space-y-2">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Subtotal:</span>
                            <span id="confirm-subtotal" class="font-semibold">Rp 0</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Pajak (10%):</span>
                            <span id="confirm-tax" class="font-semibold">Rp 0</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Biaya Pengiriman:</span>
                            <span id="confirm-shipping" class="font-semibold">Rp 0</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Diskon:</span>
                            <span id="confirm-discount" class="font-semibold">Rp 0</span>
                        </div>
                        <div class="flex justify-between border-t border-gray-200 pt-2">
                            <span class="text-lg font-bold text-gray-900">Total:</span>
                            <span id="confirm-total" class="text-lg font-bold text-green-600">Rp 0</span>
                        </div>
                    </div>

                    <!-- Notes -->
                    <div class="mt-4">
                        <h4 class="font-semibold text-gray-900 mb-2">Catatan</h4>
                        <p id="confirm-notes" class="text-gray-600 bg-gray-50 p-3 rounded-lg">-</p>
                    </div>
                </div>
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-end gap-3">
                    <button type="button" id="cancel-confirmation"
                        class="px-6 py-3 bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold rounded-xl transition-colors duration-200">
                        Batal
                    </button>
                    <button type="button" id="confirm-order"
                        class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-xl transition-colors duration-200 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Konfirmasi & Proses
                    </button>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                console.log('JavaScript loaded successfully');

                // State untuk keranjang
                let cart = [];

                // Elemen DOM
                const productSearch = document.getElementById('product-search');
                const categoryFilter = document.getElementById('category-filter');
                const productList = document.getElementById('product-list');
                const loadingProducts = document.getElementById('loading-products');
                const noProducts = document.getElementById('no-products');
                const cartItems = document.getElementById('cart-items');
                const subtotalEl = document.getElementById('subtotal');
                const taxEl = document.getElementById('tax');
                const shippingEl = document.getElementById('shipping');
                const discountEl = document.getElementById('discount');
                const totalAmountEl = document.getElementById('total-amount');
                const cashPaidEl = document.getElementById('cash_paid');
                const changeAmountEl = document.getElementById('change-amount');
                const orderForm = document.getElementById('order-form');
                const resetCartBtn = document.getElementById('reset-cart');
                const editQuantityModal = document.getElementById('edit-quantity-modal');
                const orderConfirmationModal = document.getElementById('order-confirmation-modal');
                const showConfirmationBtn = document.getElementById('show-confirmation');

                // Format angka ke format Rupiah
                function formatNumber(number) {
                    return new Intl.NumberFormat('id-ID').format(number);
                }

                // Tambah ke keranjang
                function addToCart(productId, productName, productPrice, productStock) {
                    console.log('Adding to cart:', { productId, productName, productPrice, productStock });

                    const existingItem = cart.find(item => item.productId === productId);

                    if (existingItem) {
                        if (existingItem.quantity < productStock) {
                            existingItem.quantity += 1;
                            existingItem.total = existingItem.quantity * existingItem.price;
                        } else {
                            alert(`Stok ${productName} tidak mencukupi! Stok tersisa: ${productStock}`);
                            return;
                        }
                    } else {
                        cart.push({
                            productId: productId,
                            productName: productName,
                            price: productPrice,
                            quantity: 1,
                            total: productPrice,
                            stock: productStock
                        });
                    }

                    updateCartDisplay();
                    calculateTotals();
                }

                // Hapus dari keranjang
                function removeFromCart(productId) {
                    cart = cart.filter(item => item.productId !== productId);
                    updateCartDisplay();
                    calculateTotals();
                }

                // Update quantity
                function updateQuantity(productId, change) {
                    const item = cart.find(item => item.productId === productId);

                    if (item) {
                        const newQuantity = item.quantity + change;

                        if (newQuantity < 1) {
                            removeFromCart(productId);
                            return;
                        }

                        if (newQuantity > item.stock) {
                            alert(`Stok ${item.productName} tidak mencukupi! Stok tersisa: ${item.stock}`);
                            return;
                        }

                        item.quantity = newQuantity;
                        item.total = item.quantity * item.price;

                        updateCartDisplay();
                        calculateTotals();
                    }
                }

                // Buka modal edit quantity
                function openEditQuantityModal(productId) {
                    const item = cart.find(item => item.productId === productId);

                    if (item) {
                        document.getElementById('edit-product-id').value = productId;
                        document.getElementById('edit-quantity').value = item.quantity;
                        document.getElementById('edit-quantity').max = item.stock;
                        document.getElementById('edit-stock-available').textContent = item.stock;

                        editQuantityModal.classList.remove('hidden');
                    }
                }

                // Update tampilan keranjang
                function updateCartDisplay() {
                    console.log('Updating cart display, cart items:', cart);

                    if (cart.length === 0) {
                        cartItems.innerHTML = `
                        <div class="text-center py-8 text-gray-500">
                            <svg class="w-12 h-12 mx-auto mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            <p>Belum ada item dalam keranjang</p>
                        </div>
                    `;
                        return;
                    }

                    let html = '';

                    cart.forEach(item => {
                        html += `
                        <div class="cart-item bg-gray-50 rounded-xl p-4">
                            <div class="flex justify-between items-start mb-2">
                                <div class="flex-1">
                                    <h4 class="font-semibold text-gray-900">${item.productName}</h4>
                                    <p class="text-sm text-gray-600">Rp ${formatNumber(item.price)}</p>
                                </div>
                                <div class="flex items-center gap-2">
                                    <button type="button" class="edit-quantity text-blue-600 hover:text-blue-800" data-product-id="${item.productId}">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </button>
                                    <button type="button" class="remove-item text-red-600 hover:text-red-800" data-product-id="${item.productId}">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-2">
                                    <button type="button" class="decrease-quantity bg-gray-200 hover:bg-gray-300 w-6 h-6 rounded flex items-center justify-center" data-product-id="${item.productId}">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                        </svg>
                                    </button>
                                    <span class="font-semibold mx-2">${item.quantity}</span>
                                    <button type="button" class="increase-quantity bg-gray-200 hover:bg-gray-300 w-6 h-6 rounded flex items-center justify-center" data-product-id="${item.productId}">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                    </button>
                                </div>
                                <span class="font-bold text-green-600">Rp ${formatNumber(item.total)}</span>
                            </div>
                        </div>
                    `;
                    });

                    cartItems.innerHTML = html;

                    // Re-attach event listeners untuk tombol di cart
                    attachCartEventListeners();
                }

                // Hitung total
                function calculateTotals() {
                    let subtotal = 0;

                    cart.forEach(item => {
                        subtotal += item.total;
                    });

                    const tax = subtotal * 0.10;
                    const shipping = parseFloat(shippingEl.value) || 0;
                    const discount = parseFloat(discountEl.value) || 0;

                    const totalAmount = subtotal + tax + shipping - discount;

                    subtotalEl.textContent = `Rp ${formatNumber(subtotal)}`;
                    taxEl.textContent = `Rp ${formatNumber(tax)}`;
                    totalAmountEl.textContent = `Rp ${formatNumber(totalAmount)}`;

                    calculateChange();
                }

                // Hitung kembalian
                function calculateChange() {
                    const totalAmountText = totalAmountEl.textContent.replace('Rp ', '').replace(/\./g, '');
                    const totalAmount = parseFloat(totalAmountText) || 0;
                    const cashPaid = parseFloat(cashPaidEl.value) || 0;

                    const change = cashPaid - totalAmount;

                    if (change >= 0) {
                        changeAmountEl.textContent = `Rp ${formatNumber(change)}`;
                        changeAmountEl.className = 'text-xl font-bold text-green-600';
                    } else {
                        changeAmountEl.textContent = `-Rp ${formatNumber(Math.abs(change))}`;
                        changeAmountEl.className = 'text-xl font-bold text-red-600';
                    }
                }

                // Reset keranjang
                function resetCart() {
                    if (confirm('Apakah Anda yakin ingin mengosongkan keranjang?')) {
                        cart = [];
                        updateCartDisplay();
                        calculateTotals();
                        shippingEl.value = 0;
                        discountEl.value = 0;
                        cashPaidEl.value = 0;
                        calculateChange();
                    }
                }

                // Tampilkan modal konfirmasi
                function showConfirmationModal() {
                    console.log('Show confirmation modal called');

                    if (cart.length === 0) {
                        alert('Keranjang belanja kosong! Tambahkan produk terlebih dahulu.');
                        return;
                    }

                    // Validasi form
                    const cashierName = document.getElementById('cashier_name').value;
                    const cashPaid = parseFloat(cashPaidEl.value) || 0;
                    const totalAmountText = totalAmountEl.textContent.replace('Rp ', '').replace(/\./g, '');
                    const totalAmount = parseFloat(totalAmountText) || 0;

                    if (!cashierName) {
                        alert('Nama kasir harus diisi!');
                        return;
                    }

                    if (cashPaid < totalAmount) {
                        alert('Uang yang dibayarkan kurang dari total pembayaran!');
                        return;
                    }

                    // Isi data konfirmasi
                    document.getElementById('confirm-cashier').textContent = cashierName;
                    document.getElementById('confirm-customer').textContent = document.getElementById('customer_name').value || '-';

                    const paymentMethodSelect = document.getElementById('payment_method');
                    const paymentMethodText = paymentMethodSelect.options[paymentMethodSelect.selectedIndex].text;
                    document.getElementById('confirm-payment-method').textContent = paymentMethodText;

                    document.getElementById('confirm-cash-paid').textContent = `Rp ${formatNumber(cashPaid)}`;
                    document.getElementById('confirm-change').textContent = changeAmountEl.textContent;
                    document.getElementById('confirm-subtotal').textContent = subtotalEl.textContent;
                    document.getElementById('confirm-tax').textContent = taxEl.textContent;
                    document.getElementById('confirm-shipping').textContent = `Rp ${formatNumber(parseFloat(shippingEl.value) || 0)}`;
                    document.getElementById('confirm-discount').textContent = `Rp ${formatNumber(parseFloat(discountEl.value) || 0)}`;
                    document.getElementById('confirm-total').textContent = totalAmountEl.textContent;

                    const notes = document.getElementById('notes').value;
                    document.getElementById('confirm-notes').textContent = notes || '-';

                    // Isi items
                    const confirmItems = document.getElementById('confirm-items');
                    confirmItems.innerHTML = '';

                    cart.forEach(item => {
                        const itemDiv = document.createElement('div');
                        itemDiv.className = 'flex justify-between items-center py-2 border-b border-gray-100';
                        itemDiv.innerHTML = `
                        <div>
                            <span class="font-medium">${item.productName}</span>
                            <div class="text-sm text-gray-600">
                                ${item.quantity} x Rp ${formatNumber(item.price)}
                            </div>
                        </div>
                        <span class="font-semibold text-green-600">Rp ${formatNumber(item.total)}</span>
                    `;
                        confirmItems.appendChild(itemDiv);
                    });

                    // Tampilkan modal
                    console.log('Showing confirmation modal');
                    orderConfirmationModal.classList.remove('hidden');
                }

                // Proses order setelah konfirmasi
                function processOrder() {
                    console.log('Processing order...');

                    // Siapkan data items untuk dikirim
                    const itemsContainer = document.createElement('div');
                    cart.forEach((item, index) => {
                        itemsContainer.innerHTML += `
                        <input type="hidden" name="items[${index}][product_id]" value="${item.productId}">
                        <input type="hidden" name="items[${index}][quantity]" value="${item.quantity}">
                    `;
                    });

                    orderForm.appendChild(itemsContainer);
                    orderForm.submit();
                }

                // Attach event listeners untuk cart items - DIPERBAIKI
                function attachCartEventListeners() {
                    console.log('Attaching cart event listeners');

                    // Remove item - FIX: stop propagation
                    document.querySelectorAll('.remove-item').forEach(button => {
                        button.addEventListener('click', function (e) {
                            e.stopPropagation(); // Mencegah event bubbling
                            e.preventDefault(); // Mencegah default behavior
                            const productId = this.getAttribute('data-product-id');
                            console.log('Remove item clicked:', productId);
                            removeFromCart(productId);
                        });
                    });

                    // Edit quantity - FIX: stop propagation
                    document.querySelectorAll('.edit-quantity').forEach(button => {
                        button.addEventListener('click', function (e) {
                            e.stopPropagation(); // Mencegah event bubbling
                            e.preventDefault(); // Mencegah default behavior
                            const productId = this.getAttribute('data-product-id');
                            console.log('Edit quantity clicked:', productId);
                            openEditQuantityModal(productId);
                        });
                    });

                    // Decrease quantity - FIX: stop propagation
                    document.querySelectorAll('.decrease-quantity').forEach(button => {
                        button.addEventListener('click', function (e) {
                            e.stopPropagation(); // Mencegah event bubbling
                            e.preventDefault(); // Mencegah default behavior
                            const productId = this.getAttribute('data-product-id');
                            console.log('Decrease quantity clicked:', productId);
                            updateQuantity(productId, -1);
                        });
                    });

                    // Increase quantity - FIX: stop propagation
                    document.querySelectorAll('.increase-quantity').forEach(button => {
                        button.addEventListener('click', function (e) {
                            e.stopPropagation(); // Mencegah event bubbling
                            e.preventDefault(); // Mencegah default behavior
                            const productId = this.getAttribute('data-product-id');
                            console.log('Increase quantity clicked:', productId);
                            updateQuantity(productId, 1);
                        });
                    });
                }

                // Event Listeners untuk produk - DIPERBAIKI
                productList.addEventListener('click', function (e) {
                    console.log('Product list clicked', e.target);

                    // Hanya handle tombol add-to-cart
                    if (e.target.classList.contains('add-to-cart') || e.target.closest('.add-to-cart')) {
                        const button = e.target.classList.contains('add-to-cart') ? e.target : e.target.closest('.add-to-cart');

                        // Cek jika tombol disabled
                        if (button.disabled) return;

                        const productId = button.getAttribute('data-product-id');
                        const productName = button.getAttribute('data-product-name');
                        const productPrice = parseFloat(button.getAttribute('data-product-price'));
                        const productStock = parseInt(button.getAttribute('data-product-stock'));

                        console.log('Add to cart clicked:', { productId, productName, productPrice, productStock });
                        addToCart(productId, productName, productPrice, productStock);
                    }
                });

                // Event untuk kalkulasi
                shippingEl.addEventListener('input', calculateTotals);
                discountEl.addEventListener('input', calculateTotals);
                cashPaidEl.addEventListener('input', calculateChange);

                // Reset keranjang
                resetCartBtn.addEventListener('click', resetCart);

                // Modal events - DIPERBAIKI
                document.getElementById('close-modal').addEventListener('click', function (e) {
                    e.stopPropagation();
                    editQuantityModal.classList.add('hidden');
                });

                document.getElementById('cancel-edit').addEventListener('click', function (e) {
                    e.stopPropagation();
                    editQuantityModal.classList.add('hidden');
                });

                // Simpan quantity dari modal - DIPERBAIKI
                document.getElementById('save-quantity').addEventListener('click', function (e) {
                    e.stopPropagation();
                    const productId = document.getElementById('edit-product-id').value;
                    const newQuantity = parseInt(document.getElementById('edit-quantity').value);

                    const item = cart.find(item => item.productId === productId);

                    if (item && newQuantity > 0 && newQuantity <= item.stock) {
                        item.quantity = newQuantity;
                        item.total = item.quantity * item.price;

                        updateCartDisplay();
                        calculateTotals();

                        editQuantityModal.classList.add('hidden');
                    } else {
                        alert('Jumlah tidak valid!');
                    }
                });

                // Konfirmasi order events - DIPERBAIKI
                showConfirmationBtn.addEventListener('click', function (e) {
                    e.stopPropagation();
                    showConfirmationModal();
                });

                document.getElementById('cancel-confirmation').addEventListener('click', function (e) {
                    e.stopPropagation();
                    orderConfirmationModal.classList.add('hidden');
                });

                document.getElementById('confirm-order').addEventListener('click', function (e) {
                    e.stopPropagation();
                    processOrder();
                });

                // Close modal ketika klik di luar modal - TAMBAHAN BARU
                editQuantityModal.addEventListener('click', function (e) {
                    if (e.target === editQuantityModal) {
                        editQuantityModal.classList.add('hidden');
                    }
                });

                orderConfirmationModal.addEventListener('click', function (e) {
                    if (e.target === orderConfirmationModal) {
                        orderConfirmationModal.classList.add('hidden');
                    }
                });

                // Inisialisasi
                calculateTotals();
                console.log('JavaScript initialization complete');
            });
        </script>
    @endsection
