@props(['href'])

<a href="{{ $href }}" {{ $attributes->merge(['class' => 'sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg group relative']) }}>
    <span class="flex items-center justify-center w-5 h-5 flex-shrink-0">
        {{ $slot }}
    </span>

    <span class="font-medium text-sm whitespace-nowrap flex-1">
        {{ $attributes->get('title', 'Menu') }}
    </span>

    <!-- Active indicator -->
    @if(request()->routeIs($href) || request()->routeIs(str_replace('.index', '.*', $href)))
        <div
            class="absolute right-0 top-1/2 transform -translate-y-1/2 w-1 h-6 bg-gradient-to-b from-green-400 to-emerald-600 rounded-l-full">
        </div>
    @endif
</a>
