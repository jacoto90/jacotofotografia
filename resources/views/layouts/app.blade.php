<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="XL5ItXKQNVOipnSc_BDx1ebo1d4Lk1f6jFNytoSCCRM" />
    <title>@yield('title', 'Jacoto Fotografía') - Jacoto Fotografía</title>
    <meta name="description" content="@yield('description', 'Jacoto Fotografía - Fotografía profesional en la Costa Brava. Bodas, eventos, retratos y paisajes. Capturamos tus momentos especiales.')">

    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        window.gaLoaded = false;
        function loadGA() {
            if (window.gaLoaded) return;
            window.gaLoaded = true;
            var s = document.createElement('script');
            s.async = true; s.src = 'https://www.googletagmanager.com/gtag/js?id=G-WBJVVB9MRB';
            document.head.appendChild(s);
            gtag('js', new Date());
            gtag('config', 'G-WBJVVB9MRB');
        }
        if (localStorage.getItem('cookie_consent') === 'accepted') {
            loadGA();
        }
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>:root{color-scheme:light}</style>
    <script>window.localStorage.setItem('flux.appearance','light');if(window.Flux)window.Flux.applyAppearance('light');</script>
</head>
<body class="bg-[#f4f4f4] text-[#4e5e72] font-sans antialiased min-h-screen flex flex-col">

    <x-navbar />

    <main class="flex-1">
        @yield('content')
    </main>

    <x-footer />

    @fluxScripts
    <script>window.localStorage.setItem('flux.appearance','light');document.documentElement.classList.remove('dark');document.documentElement.style.setProperty('color-scheme','light');</script>

    @stack('scripts')

    <div id="cookie-banner" role="dialog" aria-label="Aviso de cookies" style="display:none;position:fixed;bottom:0;left:0;right:0;z-index:9999;background:#4e5e72;color:#fff;padding:16px 24px;font-size:14px;box-shadow:0 -2px 10px rgba(0,0,0,0.2);">
        <div style="max-width:1000px;margin:0 auto;display:flex;flex-wrap:wrap;align-items:center;gap:16px;">
            <p style="flex:1;margin:0;line-height:1.5;">
                Usamos cookies técnicas necesarias y Google Analytics (solo con tu consentimiento) para mejorar el sitio.
                <a href="/politica-cookies" style="color:#FC9B67;text-decoration:underline;margin-left:4px;">Más información</a>
            </p>
            <div style="display:flex;gap:10px;flex-shrink:0;">
                <button id="cookie-accept" style="background:#c8e7d8;color:#4e5e72;border:none;padding:8px 20px;border-radius:6px;font-weight:600;cursor:pointer;font-size:14px;">Aceptar</button>
                <button id="cookie-decline" style="background:transparent;color:#fff;border:1px solid rgba(255,255,255,0.4);padding:8px 20px;border-radius:6px;cursor:pointer;font-size:14px;">Solo esenciales</button>
            </div>
        </div>
    </div>

    <script>
        (function() {
            var consent = localStorage.getItem('cookie_consent');
            if (!consent) {
                document.getElementById('cookie-banner').style.display = 'block';
            }
            document.getElementById('cookie-accept').addEventListener('click', function() {
                localStorage.setItem('cookie_consent', 'accepted');
                document.getElementById('cookie-banner').style.display = 'none';
                if (typeof loadGA === 'function') loadGA();
            });
            document.getElementById('cookie-decline').addEventListener('click', function() {
                localStorage.setItem('cookie_consent', 'declined');
                document.getElementById('cookie-banner').style.display = 'none';
            });
        })();
    </script>
</body>
</html>
