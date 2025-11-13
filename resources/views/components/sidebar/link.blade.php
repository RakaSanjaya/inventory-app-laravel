@props(['href'])

<a href="{{ $href }}" {{ $attributes->merge(['class' => 'flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-300 ease-in-out group relative']) }} aria-current="{{ request()->routeIs($href) ? 'page' : 'false' }}">
    <span class="flex items-center justify-center w-6 h-6 transition-colors duration-300">
        {{ $slot }}
    </span>

    <span class="font-medium text-sm transition-colors duration-300 whitespace-nowrap">
        {{ $attributes->get('title', 'Menu') }}
    </span>

    <!-- Active indicator -->
    @if(request()->routeIs($href) || request()->routeIs(str_replace('.index', '.*', $href)))
        <div
            class="absolute right-0 top-1/2 transform -translate-y-1/2 w-1 h-8 bg-gradient-to-b from-green-400 to-emerald-600 rounded-l-full">
        </div>
    @endif
</a>