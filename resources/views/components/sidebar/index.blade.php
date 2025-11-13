<section class="fixed h-screen mt-20 w-1/5 bg-white shadow-xl border-r border-gray-100 z-20">
    <div class="flex flex-col p-4 space-y-2">
        <!-- Dashboard -->
        <x-sidebar.link href="{{ route('dashboard') }}" title="Dashboard" class="{{ request()->routeIs('dashboard') ?
    'bg-gradient-to-r from-green-500 to-emerald-600 text-white shadow-lg shadow-green-200 scale-105' :
    'text-gray-600 hover:bg-gray-50 hover:text-green-600 hover:shadow-md' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                fill="{{ request()->routeIs('dashboard') ? 'currentColor' : 'none' }}"
                stroke="{{ request()->routeIs('dashboard') ? 'none' : 'currentColor' }}" stroke-width="1.5"
                viewBox="0 0 24 24">
                <path fill-rule="evenodd"
                    d="M3 6a3 3 0 0 1 3-3h2.25a3 3 0 0 1 3 3v2.25a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3V6Zm9.75 0a3 3 0 0 1 3-3H18a3 3 0 0 1 3 3v2.25a3 3 0 0 1-3 3h-2.25a3 3 0 0 1-3-3V6ZM3 15.75a3 3 0 0 1 3-3h2.25a3 3 0 0 1 3 3V18a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3v-2.25Zm9.75 0a3 3 0 0 1 3-3H18a3 3 0 0 1 3 3V18a3 3 0 0 1-3 3h-2.25a3 3 0 0 1-3-3v-2.25Z"
                    clip-rule="evenodd" />
            </svg>
        </x-sidebar.link>

        <!-- Products -->
        <x-sidebar.link href="{{ route('products.index') }}" title="Products" class="{{ request()->routeIs('products.*') ?
    'bg-gradient-to-r from-green-500 to-emerald-600 text-white shadow-lg shadow-green-200 scale-105' :
    'text-gray-600 hover:bg-gray-50 hover:text-green-600 hover:shadow-md' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                fill="{{ request()->routeIs('products.*') ? 'currentColor' : 'none' }}"
                stroke="{{ request()->routeIs('products.*') ? 'none' : 'currentColor' }}" stroke-width="1.5"
                viewBox="0 0 24 24">
                <path
                    d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375Z" />
                <path fill-rule="evenodd"
                    d="m3.087 9 .54 9.176A3 3 0 0 0 6.62 21h10.757a3 3 0 0 0 2.995-2.824L20.913 9H3.087Zm6.163 3.75A.75.75 0 0 1 10 12h4a.75.75 0 0 1 0 1.5h-4a.75.75 0 0 1-.75-.75Z"
                    clip-rule="evenodd" />
            </svg>
        </x-sidebar.link>

        <!-- Accounts (Conditional) -->
        @if(auth()->user()->role !== 'user')
            <x-sidebar.link href="{{ route('accounts.index') }}" title="Accounts" class="{{ request()->routeIs('accounts.*') ?
            'bg-gradient-to-r from-green-500 to-emerald-600 text-white shadow-lg shadow-green-200 scale-105' :
            'text-gray-600 hover:bg-gray-50 hover:text-green-600 hover:shadow-md' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                    fill="{{ request()->routeIs('accounts.*') ? 'currentColor' : 'none' }}"
                    stroke="{{ request()->routeIs('accounts.*') ? 'none' : 'currentColor' }}" stroke-width="1.7"
                    viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M8.25 6.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM15.75 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM2.25 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM6.31 15.117A6.745 6.745 0 0 1 12 12a6.745 6.745 0 0 1 6.709 7.498.75.75 0 0 1-.372.568A12.696 12.696 0 0 1 12 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 0 1-.372-.568 6.787 6.787 0 0 1 1.019-4.38Z"
                        clip-rule="evenodd" />
                    <path
                        d="M5.082 14.254a8.287 8.287 0 0 0-1.308 5.135 9.687 9.687 0 0 1-1.764-.44l-.115-.04a.563.563 0 0 1-.373-.487l-.01-.121a3.75 3.75 0 0 1 3.57-4.047ZM20.226 19.389a8.287 8.287 0 0 0-1.308-5.135 3.75 3.75 0 0 1 3.57 4.047l-.01.121a.563.563 0 0 1-.373.486l-.115.04c-.567.2-1.156.349-1.764.441Z" />
                </svg>
            </x-sidebar.link>
        @endif

        <!-- History Activity -->
        <x-sidebar.link href="{{ route('history.index') }}" title="History Activity" class="{{ request()->routeIs('history.*') ?
    'bg-gradient-to-r from-green-500 to-emerald-600 text-white shadow-lg shadow-green-200 scale-105' :
    'text-gray-600 hover:bg-gray-50 hover:text-green-600 hover:shadow-md' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                fill="{{ request()->routeIs('history.*') ? 'currentColor' : 'none' }}"
                stroke="{{ request()->routeIs('history.*') ? 'none' : 'currentColor' }}" stroke-width="1.5"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
            </svg>
        </x-sidebar.link>

        <!-- Manage Categories -->
        <x-sidebar.link href="{{ route('categories.index') }}" title="Manage Categories" class="{{ request()->routeIs('categories.*') ?
    'bg-gradient-to-r from-green-500 to-emerald-600 text-white shadow-lg shadow-green-200 scale-105' :
    'text-gray-600 hover:bg-gray-50 hover:text-green-600 hover:shadow-md' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                fill="{{ request()->routeIs('categories.*') ? 'currentColor' : 'none' }}"
                stroke="{{ request()->routeIs('categories.*') ? 'none' : 'currentColor' }}" stroke-width="1.5"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
            </svg>
        </x-sidebar.link>

        <!-- Storage Locations -->
        <x-sidebar.link href="{{ route('locations.index') }}" title="Storage Locations" class="{{ request()->routeIs('locations.*') ?
    'bg-gradient-to-r from-green-500 to-emerald-600 text-white shadow-lg shadow-green-200 scale-105' :
    'text-gray-600 hover:bg-gray-50 hover:text-green-600 hover:shadow-md' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                fill="{{ request()->routeIs('locations.*') ? 'currentColor' : 'none' }}"
                stroke="{{ request()->routeIs('locations.*') ? 'none' : 'currentColor' }}" stroke-width="1.5"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m7.875 14.25 1.214 1.942a2.25 2.25 0 0 0 1.908 1.058h2.006c.776 0 1.497-.4 1.908-1.058l1.214-1.942M2.41 9h4.636a2.25 2.25 0 0 1 1.872 1.002l.164.246a2.25 2.25 0 0 0 1.872 1.002h2.092a2.25 2.25 0 0 0 1.872-1.002l.164-.246A2.25 2.25 0 0 1 16.954 9h4.636M2.41 9a2.25 2.25 0 0 0-.16.832V12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 12V9.832c0-.287-.055-.57-.16-.832M2.41 9a2.25 2.25 0 0 1 .382-.632l3.285-3.832a2.25 2.25 0 0 1 1.708-.786h8.43c.657 0 1.281.287 1.709.786l3.284 3.832c.163.19.291.404.382.632M4.5 20.25h15A2.25 2.25 0 0 0 21.75 18v-2.625c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125V18a2.25 2.25 0 0 0 2.25 2.25Z" />
            </svg>
        </x-sidebar.link>

        <!-- Profile -->
        <x-sidebar.link href="{{ route('profile.index') }}" title="Profile" class="{{ request()->routeIs('profile.*') ?
    'bg-gradient-to-r from-green-500 to-emerald-600 text-white shadow-lg shadow-green-200 scale-105' :
    'text-gray-600 hover:bg-gray-50 hover:text-green-600 hover:shadow-md' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                fill="{{ request()->routeIs('profile.*') ? 'currentColor' : 'none' }}"
                stroke="{{ request()->routeIs('profile.*') ? 'none' : 'currentColor' }}" stroke-width="1.5"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            </svg>
        </x-sidebar.link>
    </div>

    <!-- User Info Section -->
    <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-gray-100 bg-white">
        <div class="flex items-center gap-3 p-3 rounded-xl bg-gray-50">
            <div
                class="w-8 h-8 bg-gradient-to-r from-green-500 to-emerald-600 rounded-full flex items-center justify-center">
                <span class="text-white text-sm font-semibold">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </span>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-medium text-gray-900 truncate">{{ Auth::user()->name }}</p>
                <p class="text-xs text-gray-500 capitalize">{{ Auth::user()->role }}</p>
            </div>
        </div>
    </div>
</section>
