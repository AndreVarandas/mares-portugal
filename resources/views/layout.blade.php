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
    <!-- Dark mode toggle -->
    <div class="flex justify-end container mx-auto p-6">
        <input type="checkbox" id="darkModeToggle" class="hidden" aria-checked="false" role="switch">
        <label for="darkModeToggle"
            class="bg-gray-300 dark:bg-gray-700 w-12 h-6 rounded-full flex items-center p-1 cursor-pointer">
            <div class="w-5 h-5 bg-gray-600 dark:bg-blue-300 rounded-full" id="darkModeIndicator"></div>
        </label>
    </div>

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
</body>

</html>
