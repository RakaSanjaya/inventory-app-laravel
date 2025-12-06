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
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
        @vite('resources/css/app.css')
        <title>
            @isset($title)
                {{ $title }} | Inventory App
            @else
                App
            @endisset
        </title>
    </head>

    <body class="font-inter leading-normal tracking-normal text-sm">
        <x-navbar.index></x-navbar.index>
        <div class="flex bg-white min-h-screen">
            <x-sidebar />
            <main id="main-content" class="flex-1 bg-gray-50 px-6 py-6 mt-20 ml-64 transition-[margin] duration-0">
                @yield('content')
            </main>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const sidebar = document.getElementById('sidebar');
                const mainContent = document.getElementById('main-content');
                const toggleBtn = document.getElementById('sidebar-toggle');
                const toggleIcon = document.getElementById('toggle-icon');

                // Check saved state
                const isCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';

                // Set initial state
                if (isCollapsed) {
                    collapseSidebar();
                } else {
                    expandSidebar();
                }

                // Toggle sidebar
                toggleBtn.addEventListener('click', function () {
                    if (sidebar.classList.contains('w-64')) {
                        collapseSidebar();
                        localStorage.setItem('sidebarCollapsed', 'true');
                    } else {
                        expandSidebar();
                        localStorage.setItem('sidebarCollapsed', 'false');
                    }
                });

                function collapseSidebar() {
                    // Update sidebar width
                    sidebar.classList.remove('w-64');
                    sidebar.classList.add('w-16');

                    // Update main content margin
                    mainContent.classList.remove('ml-64');
                    mainContent.classList.add('ml-16');

                    // Update toggle icon
                    toggleIcon.classList.add('rotate-180');

                    // Add data attribute for CSS targeting
                    sidebar.setAttribute('data-collapsed', 'true');
                }

                function expandSidebar() {
                    // Update sidebar width
                    sidebar.classList.remove('w-16');
                    sidebar.classList.add('w-64');

                    // Update main content margin
                    mainContent.classList.remove('ml-16');
                    mainContent.classList.add('ml-64');

                    // Update toggle icon
                    toggleIcon.classList.remove('rotate-180');

                    // Remove data attribute
                    sidebar.setAttribute('data-collapsed', 'false');
                }
            });
        </script>

        @yield('scripts')
        @stack('scripts')
    </body>

    </html>
