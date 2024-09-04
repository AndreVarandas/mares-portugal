<!DOCTYPE html>
<html lang="pt">

<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>🌊 Mares de Portugal - Níveis do Mar, Marés e Dados Lunares</title>

    <meta name="description" content="Verifique os níveis atuais do mar, horários das marés e dados lunares para todos os portos de Portugal. Mantenha-se informado com informações precisas e atualizadas sobre as condições costeiras em Portugal.">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Mares de Portugal - Níveis do Mar, Marés e Dados Lunares">
    <meta property="og:description" content="Verifique os níveis atuais do mar, horários das marés e dados lunares para todos os portos de Portugal. Mantenha-se informado com informações precisas e atualizadas sobre as condições costeiras em Portugal.">
    <meta property="og:image" content="{{ url('/images/sea-logo.webp') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Mares de Portugal - Níveis do Mar, Marés e Dados Lunares">
    <meta name="twitter:description" content="Verifique os níveis atuais do mar, horários das marés e dados lunares para todos os portos de Portugal. Mantenha-se informado com informações precisas e atualizadas sobre as condições costeiras em Portugal.">
    <meta name="twitter:image" content="{{ url('/images/sea-logo.webp') }}">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite('resources/css/app.css')

    <!-- Analytics -->
    <script defer data-domain="mares.varandas.io" src="https://analytics.varandas.io/js/script.js"></script>
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
