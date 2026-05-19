<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="XL5ItXKQNVOipnSc_BDx1ebo1d4Lk1f6jFNytoSCCRM" />
    <title>@yield('title', 'Jacoto Fotografía') - Jacoto Fotografía</title>
    <meta name="description" content="@yield('description', 'Jacoto Fotografía - Fotografía profesional en la Costa Brava. Bodas, eventos, retratos y paisajes. Capturamos tus momentos especiales.')">

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-WBJVVB9MRB"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-WBJVVB9MRB');
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @fluxAppearance
</head>
<body class="bg-[#f4f4f4] text-[#4e5e72] font-sans antialiased min-h-screen flex flex-col">

    <x-navbar />

    <main class="flex-1">
        @yield('content')
    </main>

    <x-footer />

    @fluxScripts

    @stack('scripts')
</body>
</html>
