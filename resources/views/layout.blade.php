<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>🌊 Mares de Portugal - Current Sea Levels, Tides, and Lunar Data</title>

    <meta name="description" content="Check current sea levels, tide schedules, and lunar data for all Portuguese ports. Stay informed with accurate and up-to-date information on Portugal's coastal conditions.">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Mares de Portugal - Sea Levels, Tides, and Lunar Information">
    <meta property="og:description" content="Discover current sea levels, tide schedules, and lunar data for all Portuguese ports. Stay informed about coastal conditions in Portugal.">
    <meta property="og:image" content="{{ url('/path-to-your-image.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Mares de Portugal - Sea Levels, Tides, and Lunar Information">
    <meta name="twitter:description" content="Check the latest sea levels, tides, and lunar data for Portuguese ports. Stay informed with our detailed coastal information.">
    <meta name="twitter:image" content="{{ url('/path-to-your-image.jpg') }}">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite('resources/css/app.css')
</head>

<body class="antialiased bg-white dark:bg-gray-900">
    <!-- Navigation -->
    @include('components.navigation')

    <!-- Main Content -->
    <main class="flex flex-col justify-center h-full">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('components.footer')

    <!-- Scripts -->
    @vite('resources/js/app.js')
</body>

</html>