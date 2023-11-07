<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>🌊 Mares de Portugal</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite('resources/css/app.css')
</head>

<body class="antialiased">
    @yield('content')

    <footer class="container mx-auto py-8">
        <div class="flex justify-center items-center">
            <img src={{ asset('icons/tide.svg') }} alt="Andre Varandas Logo" class="w-12 h-12 rounded-full" />
            <p class="ml-4 text-gray-600">Made with &#9829;
                by <a href="https://github.com/andrevarandas" target="_blank" rel="noopener noreferrer"
                    class="font-semibold">Andre Varandas</a>
                & <a href="
                        https://github.com/andrebravoferreira" target="_blank"
                    rel="noopener noreferrer" class="font-semibold">André Bravo</a>
            </p>
        </div>
    </footer>

    <!-- Scripts -->
    @vite('resources/js/app.js')
</body>

</html>
