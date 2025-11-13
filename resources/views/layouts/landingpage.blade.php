<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')
    <title>
        @isset($title)
            {{ $title }} | Inventory App
        @else
            App
        @endisset
    </title>
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <x-navbar.index></x-navbar.index>

    <div class="flex h-screen">
        <section class="container mx-auto mt-28">
            @yield('content')
        </section>
    </div>
    <!-- load jQuery (CDN) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJ+Y3r2e+6k3f5tM2QbZ4d1QvQvFv2rX1QvQ=" crossorigin="anonymous"></script>

    {{-- pastikan ada ini supaya @section('scripts') di home.blade.php dipasang --}}
    @yield('scripts')
</body>

</html>