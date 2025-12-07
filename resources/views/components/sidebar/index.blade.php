<section id="sidebar" class="fixed h-screen mt-20 w-64 bg-white shadow-xl border-r border-gray-100 z-50 overflow-hidden"
    data-collapsed="false">
    <!-- Toggle Button -->
    <div class="flex justify-end p-3 border-b border-gray-100">
        <button id="sidebar-toggle"
            class="p-1.5 rounded-lg text-gray-500 hover:bg-gray-100 hover:text-gray-700 transition-colors">
            <svg id="toggle-icon" class="w-4 h-4 transition-transform duration-300" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
            </svg>
        </button>
    </div>

    <!-- Navigation Links -->
    <div class="flex flex-col p-2 space-y-1 flex-1">
        <!-- Dashboard -->
        <x-sidebar.link href="{{ route('dashboard') }}" title="Dashboard"
            class="{{ request()->routeIs('dashboard') ? 'bg-gradient-to-r from-green-500 to-emerald-600 text-white' : 'text-gray-600 hover:bg-gray-50 hover:text-green-600' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
        </x-sidebar.link>

        <!-- Products -->
        <x-sidebar.link href="{{ route('products.index') }}" title="Products"
            class="{{ request()->routeIs('products.*') ? 'bg-gradient-to-r from-green-500 to-emerald-600 text-white' : 'text-gray-600 hover:bg-gray-50 hover:text-green-600' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
            </svg>
        </x-sidebar.link>

        <!-- Orders -->
        <x-sidebar.link href="{{ route('orders.index') }}" title="Orders"
            class="{{ request()->routeIs('orders.*') ? 'bg-gradient-to-r from-green-500 to-emerald-600 text-white' : 'text-gray-600 hover:bg-gray-50 hover:text-green-600' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
        </x-sidebar.link>

        <!-- Accounts (Conditional) -->
        @if(auth()->user()->role !== 'user')
            <x-sidebar.link href="{{ route('accounts.index') }}" title="Accounts"
                class="{{ request()->routeIs('accounts.*') ? 'bg-gradient-to-r from-green-500 to-emerald-600 text-white' : 'text-gray-600 hover:bg-gray-50 hover:text-green-600' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
            </x-sidebar.link>
        @endif

        <!-- History Activity -->
        <x-sidebar.link href="{{ route('history.index') }}" title="History Activity"
            class="{{ request()->routeIs('history.*') ? 'bg-gradient-to-r from-green-500 to-emerald-600 text-white' : 'text-gray-600 hover:bg-gray-50 hover:text-green-600' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </x-sidebar.link>

        <!-- Manage Categories -->
        <x-sidebar.link href="{{ route('categories.index') }}" title="Manage Categories"
            class="{{ request()->routeIs('categories.*') ? 'bg-gradient-to-r from-green-500 to-emerald-600 text-white' : 'text-gray-600 hover:bg-gray-50 hover:text-green-600' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
            </svg>
        </x-sidebar.link>

        <!-- Suppliers -->
        <x-sidebar.link href="{{ route('suppliers.index') }}" title="Suppliers"
            class="{{ request()->routeIs('suppliers.*') ? 'bg-gradient-to-r from-green-500 to-emerald-600 text-white' : 'text-gray-600 hover:bg-gray-50 hover:text-green-600' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
            </svg>
        </x-sidebar.link>

        <!-- Storage Locations -->
        <x-sidebar.link href="{{ route('locations.index') }}" title="Storage Locations"
            class="{{ request()->routeIs('locations.*') ? 'bg-gradient-to-r from-green-500 to-emerald-600 text-white' : 'text-gray-600 hover:bg-gray-50 hover:text-green-600' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
        </x-sidebar.link>

        <!-- Profile -->
        <x-sidebar.link href="{{ route('profile.index') }}" title="Profile"
            class="{{ request()->routeIs('profile.*') ? 'bg-gradient-to-r from-green-500 to-emerald-600 text-white' : 'text-gray-600 hover:bg-gray-50 hover:text-green-600' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
        </x-sidebar.link>
    </div>

    <!-- User Info Section -->
    <div class="border-t border-gray-100 bg-white p-2">
        <div class="flex items-center p-2 rounded-lg bg-gray-50">
            <div
                class="w-8 h-8 bg-gradient-to-r from-green-500 to-emerald-600 rounded-full flex items-center justify-center flex-shrink-0">
                <span class="text-white text-sm font-semibold">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </span>
            </div>
            <div class="user-info-text ml-3 min-w-0">
                <p class="text-sm font-medium text-gray-900 truncate">{{ Auth::user()->name }}</p>
                <p class="text-xs text-gray-500 capitalize">{{ Auth::user()->role }}</p>
            </div>
        </div>
    </div>
</section>

<style>
    /* Hide text when sidebar collapsed */
    [data-collapsed="true"] .sidebar-link span:last-child,
    [data-collapsed="true"] .user-info-text {
        display: none !important;
    }

    /* Center items when collapsed */
    [data-collapsed="true"] .sidebar-link {
        justify-content: center;
        padding: 0.5rem;
    }

    [data-collapsed="true"] .sidebar-user-container {
        justify-content: center;
        padding: 0.5rem;
    }

    /* Tooltip for collapsed state */
    [data-collapsed="true"] .sidebar-link {
        position: relative;
    }

    [data-collapsed="true"] .sidebar-link:hover::before {
        content: attr(title);
        position: absolute;
        left: 100%;
        top: 50%;
        transform: translateY(-50%);
        background: #1f2937;
        color: white;
        padding: 0.5rem 0.75rem;
        border-radius: 0.375rem;
        font-size: 0.75rem;
        white-space: nowrap;
        z-index: 60;
        margin-left: 0.5rem;
        pointer-events: none;
    }

    /* Hide active indicator when collapsed */
    [data-collapsed="true"] .sidebar-link .absolute {
        display: none;
    }

    /* Remove all transitions from sidebar */
    #sidebar,
    #sidebar * {
        transition: none !important;
    }

    /* Only keep transition for toggle icon */
    #toggle-icon {
        transition: transform 0.3s ease !important;
    }
</style>