<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>🌊 Mares de Portugal - Tides, Schedules, and Information</title>
    <meta name="description"
        content="Discover tides, schedules, and detailed information about Portugal's coasts and ports.">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Analytics -->
    <script defer data-domain="mares.andrevarandas.dev" src="https://analytics.varandas.io/js/pls.js"></script>

    <!-- Styles -->
    @vite('resources/css/app.css')
</head>

<body class="antialiased bg-white dark:bg-gray-900">
    <!-- Navigation menu -->
    <header class="bg-gray-100 dark:bg-gray-800 shadow">
        <nav class="container mx-auto px-6 md:px-0 py-4 flex justify-between items-center">
            <!-- Logo -->
            <div class="hidden md:block">
                <a href="#" class="text-xl font-bold text-gray-800 dark:text-white">
                    <img src={{ asset('icons/tide.svg') }} alt="Mares de Portugal" class="h-8">
                </a>
            </div>

            <!-- Hamburger icon for mobile -->
            <div class="block md:hidden">
                <button id="hamburger" class="flex items-center text-gray-800 dark:text-white focus:outline-none"
                    onclick="toggleMenu()">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>

            <!-- Menu items -->
            <ul id="menu" class="hidden md:flex md:space-x-4 md:text-gray-600 md:dark:text-gray-300">
                <li><a href="#" class="hover:text-gray-900 dark:hover:text-white">Tides</a></li>
                <li><a href="#" class="hover:text-gray-900 dark:hover:text-white">Moons</a></li>
            </ul>

            <!-- Dark mode toggle -->
            <div class="flex items-center space-x-4">
                <input type="checkbox" id="darkModeToggle" class="hidden" aria-checked="false" role="switch">
                <label for="darkModeToggle"
                    class="bg-gray-300 dark:bg-gray-700 w-12 h-6 rounded-full flex items-center p-1 cursor-pointer">
                    <div class="w-5 h-5 bg-gray-600 dark:bg-blue-300 rounded-full" id="darkModeIndicator"></div>
                </label>
            </div>
        </nav>
    </header>


    <!-- Page content -->
    @yield('content')

    <!-- Footer -->
    <footer class="container mx-auto max-w-4xl px-4 py-8 flex justify-center items-center text-gray-600">
        <p>by
            <a href="https://github.com/andrevarandas" target="_blank" rel="noopener noreferrer"
                class="font-semibold underline">Andre Varandas</a>
            & <a href="https://github.com/andrebravoferreira" target="_blank" rel="noopener noreferrer"
                class="font-semibold underline">André Bravo Ferreira</a>
        </p>
    </footer>

    <!-- Scripts -->
    @vite('resources/js/app.js')

    <script>
        function toggleMenu() {
            const menu = document.getElementById("menu");
            if (menu.style.display === "none" || menu.style.display === "") {
                menu.style.display = "block";
            } else {
                menu.style.display = "none";
            }
        }
    </script>
</body>

</html>
