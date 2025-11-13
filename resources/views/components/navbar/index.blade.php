<nav class="bg-white shadow-lg border-b border-gray-100 fixed w-full z-50 backdrop-blur-sm bg-white/95">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-20 items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <div class="w-10 h-10 bg-gradient-to-r from-green-600 to-emerald-500 rounded-xl flex items-center justify-center shadow-lg group-hover:shadow-xl transition-all duration-300">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-xl font-bold bg-gradient-to-r from-green-600 to-emerald-500 bg-clip-text text-transparent">
                            Inventory
                        </span>
                        <span class="text-xs text-gray-500 -mt-1">Management System</span>
                    </div>
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden md:flex items-center gap-x-8">
                @guest
                <x-navbar.link href="{{ route('home') }}" class="group">
                    <span class="relative">
                        Home
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-green-600 group-hover:w-full transition-all duration-300"></span>
                    </span>
                </x-navbar.link>
                <x-navbar.link href="{{ route('about') }}" class="group">
                    <span class="relative">
                        About
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-green-600 group-hover:w-full transition-all duration-300"></span>
                    </span>
                </x-navbar.link>
                <x-navbar.link href="{{ route('contact') }}" class="group">
                    <span class="relative">
                        Contact
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-green-600 group-hover:w-full transition-all duration-300"></span>
                    </span>
                </x-navbar.link>
                @else
                <x-navbar.link href="{{ route('dashboard') }}" class="group">
                    <span class="relative">
                        Dashboard
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-green-600 group-hover:w-full transition-all duration-300"></span>
                    </span>
                </x-navbar.link>
                <x-navbar.link href="" class="group">
                    <span class="relative">
                        Items
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-green-600 group-hover:w-full transition-all duration-300"></span>
                    </span>
                </x-navbar.link>
                <x-navbar.link href="{{ route('categories.index') }}" class="group">
                    <span class="relative">
                        Categories
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-green-600 group-hover:w-full transition-all duration-300"></span>
                    </span>
                </x-navbar.link>
                @endguest
            </div>

            <!-- Right Section -->
            <div class="flex items-center gap-x-4">
                @guest
                <!-- Login Button for Guests -->
                <div class="hidden md:flex items-center gap-x-4">
                    <a href="{{ route('login') }}"
                       class="bg-gradient-to-r from-green-600 to-emerald-500 hover:from-green-700 hover:to-emerald-600 text-white font-semibold px-6 py-2.5 rounded-full transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                        </svg>
                        <span>Login</span>
                    </a>
                </div>
                @else
                <!-- User Menu for Authenticated Users -->
                <div class="flex items-center gap-x-4">
                    <!-- Notifications -->
                    <x-navbar.link href="{{ route('notifications.index') }}" class="relative group">
                        <div class="p-2 rounded-xl bg-green-50 text-green-600 group-hover:bg-green-100 transition-all duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0018 9.75V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"></path>
                            </svg>
                        </div>
                        <span class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 text-white text-xs rounded-full flex items-center justify-center font-bold">
                            3
                        </span>
                    </x-navbar.link>

                    <!-- User Profile Dropdown -->
                    <div class="relative group">
                        <button class="flex items-center gap-2 p-2 rounded-xl bg-gray-50 hover:bg-gray-100 transition-all duration-300">
                            <div class="w-8 h-8 bg-gradient-to-r from-green-600 to-emerald-500 rounded-full flex items-center justify-center text-white font-semibold text-sm">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <svg class="w-4 h-4 text-gray-600 group-hover:text-gray-800 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <!-- Dropdown Menu -->
                        <div class="absolute right-0 top-full mt-2 w-48 bg-white rounded-xl shadow-lg border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0">
                            <div class="p-4 border-b border-gray-100">
                                <p class="font-semibold text-gray-900 text-sm">{{ Auth::user()->name }}</p>
                                <p class="text-gray-500 text-xs">{{ Auth::user()->email }}</p>
                            </div>
                            <div class="p-2">
                                <a href="{{ route('profile.edit') }}" class="flex items-center gap-2 px-3 py-2 text-sm text-gray-700 hover:bg-gray-50 rounded-lg transition-colors duration-200">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    Profile
                                </a>
                                <a href="{{ route('dashboard') }}" class="flex items-center gap-2 px-3 py-2 text-sm text-gray-700 hover:bg-gray-50 rounded-lg transition-colors duration-200">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                    </svg>
                                    Dashboard
                                </a>
                            </div>
                            <div class="p-2 border-t border-gray-100">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="flex items-center gap-2 w-full px-3 py-2 text-sm text-red-600 hover:bg-red-50 rounded-lg transition-colors duration-200">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                        </svg>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endguest

                <!-- Mobile Menu Button -->
                <button class="md:hidden p-2 rounded-xl bg-gray-50 hover:bg-gray-100 transition-all duration-300">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>

<!-- Mobile Menu -->
<div class="md:hidden fixed inset-0 z-40 bg-white transform translate-x-full transition-transform duration-300" id="mobile-menu">
    <div class="flex flex-col h-full p-6">
        <div class="flex justify-between items-center mb-8">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-gradient-to-r from-green-600 to-emerald-500 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                </div>
                <div class="flex flex-col">
                    <span class="text-xl font-bold bg-gradient-to-r from-green-600 to-emerald-500 bg-clip-text text-transparent">
                        Inventory
                    </span>
                    <span class="text-xs text-gray-500 -mt-1">Management System</span>
                </div>
            </div>
            <button class="p-2 rounded-xl bg-gray-50" id="close-mobile-menu">
                <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <div class="flex-1 space-y-4">
            @guest
            <a href="{{ route('home') }}" class="block py-3 px-4 text-gray-700 hover:bg-green-50 rounded-xl transition-colors duration-200 font-medium">Home</a>
            <a href="{{ route('about') }}" class="block py-3 px-4 text-gray-700 hover:bg-green-50 rounded-xl transition-colors duration-200 font-medium">About</a>
            <a href="{{ route('contact') }}" class="block py-3 px-4 text-gray-700 hover:bg-green-50 rounded-xl transition-colors duration-200 font-medium">Contact</a>
            @else
            <a href="{{ route('dashboard') }}" class="block py-3 px-4 text-gray-700 hover:bg-green-50 rounded-xl transition-colors duration-200 font-medium">Dashboard</a>
            <a href="" class="block py-3 px-4 text-gray-700 hover:bg-green-50 rounded-xl transition-colors duration-200 font-medium">Items</a>
            <a href="{{ route('categories.index') }}" class="block py-3 px-4 text-gray-700 hover:bg-green-50 rounded-xl transition-colors duration-200 font-medium">Categories</a>
            <a href="{{ route('notifications.index') }}" class="block py-3 px-4 text-gray-700 hover:bg-green-50 rounded-xl transition-colors duration-200 font-medium">Notifications</a>
            <a href="{{ route('profile.edit') }}" class="block py-3 px-4 text-gray-700 hover:bg-green-50 rounded-xl transition-colors duration-200 font-medium">Profile</a>
            @endguest
        </div>

        <div class="pt-6 border-t border-gray-200">
            @guest
            <a href="{{ route('login') }}" class="block w-full bg-gradient-to-r from-green-600 to-emerald-500 text-white text-center font-semibold py-3 rounded-xl transition-all duration-300 transform hover:scale-105">
                Login
            </a>
            @else
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="block w-full text-red-600 text-center font-semibold py-3 border border-red-200 rounded-xl hover:bg-red-50 transition-colors duration-200">
                    Logout
                </button>
            </form>
            @endguest
        </div>
    </div>
</div>

<script>
    // Mobile menu functionality
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenu = document.getElementById('mobile-menu');
        const openMenuButton = document.querySelector('button[class*="md:hidden"]');
        const closeMenuButton = document.getElementById('close-mobile-menu');

        openMenuButton.addEventListener('click', function() {
            mobileMenu.classList.remove('translate-x-full');
        });

        closeMenuButton.addEventListener('click', function() {
            mobileMenu.classList.add('translate-x-full');
        });

        // Close menu when clicking on links
        mobileMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', function() {
                mobileMenu.classList.add('translate-x-full');
            });
        });
    });
</script>
