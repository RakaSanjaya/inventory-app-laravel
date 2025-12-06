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
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M2.25 12v7.5a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 19.5v-7.5m-18 0h6.75" />
            </svg>
        </x-sidebar.link>

        <!-- Products -->
        <x-sidebar.link href="{{ route('products.index') }}" title="Products"
            class="{{ request()->routeIs('products.*') ? 'bg-gradient-to-r from-green-500 to-emerald-600 text-white' : 'text-gray-600 hover:bg-gray-50 hover:text-green-600' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0l-3-3m3 3l3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
            </svg>
        </x-sidebar.link>

        <!-- Orders -->
        <x-sidebar.link href="{{ route('orders.index') }}" title="Orders"
            class="{{ request()->routeIs('orders.*') ? 'bg-gradient-to-r from-green-500 to-emerald-600 text-white' : 'text-gray-600 hover:bg-gray-50 hover:text-green-600' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
            </svg>
        </x-sidebar.link>

        <!-- Accounts (Conditional) -->
        @if(auth()->user()->role !== 'user')
            <x-sidebar.link href="{{ route('accounts.index') }}" title="Accounts"
                class="{{ request()->routeIs('accounts.*') ? 'bg-gradient-to-r from-green-500 to-emerald-600 text-white' : 'text-gray-600 hover:bg-gray-50 hover:text-green-600' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                </svg>
            </x-sidebar.link>
        @endif

        <!-- History Activity -->
        <x-sidebar.link href="{{ route('history.index') }}" title="History Activity"
            class="{{ request()->routeIs('history.*') ? 'bg-gradient-to-r from-green-500 to-emerald-600 text-white' : 'text-gray-600 hover:bg-gray-50 hover:text-green-600' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </x-sidebar.link>

        <!-- Manage Categories -->
        <x-sidebar.link href="{{ route('categories.index') }}" title="Manage Categories"
            class="{{ request()->routeIs('categories.*') ? 'bg-gradient-to-r from-green-500 to-emerald-600 text-white' : 'text-gray-600 hover:bg-gray-50 hover:text-green-600' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5l-3.9 19.5m-2.1-19.5l-3.9 19.5" />
            </svg>
        </x-sidebar.link>

        <!-- Storage Locations -->
        <x-sidebar.link href="{{ route('locations.index') }}" title="Storage Locations"
            class="{{ request()->routeIs('locations.*') ? 'bg-gradient-to-r from-green-500 to-emerald-600 text-white' : 'text-gray-600 hover:bg-gray-50 hover:text-green-600' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205l3 1m1.5.5l-1.5-.5M6.75 7.364V3h-3v18m3-13.636l10.5-3.819" />
            </svg>
        </x-sidebar.link>

        <!-- Profile -->
        <x-sidebar.link href="{{ route('profile.index') }}" title="Profile"
            class="{{ request()->routeIs('profile.*') ? 'bg-gradient-to-r from-green-500 to-emerald-600 text-white' : 'text-gray-600 hover:bg-gray-50 hover:text-green-600' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
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
