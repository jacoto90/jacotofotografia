<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin') - Jacoto Fotografía</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>:root{color-scheme:light}</style>
    <script>window.localStorage.setItem('flux.appearance','light');if(window.Flux)window.Flux.applyAppearance('light');</script>
    <style>
        dialog[open] { background: #fff; }
        [data-flux-navlist-item] a, [data-flux-sidebar-brand] a { color: #4e5e72 !important; }
        [data-flux-navlist-item] a:hover { color: #FC9B67 !important; }
    </style>
</head>
<body class="bg-gray-100 text-[#4e5e72] font-sans antialiased min-h-screen flex flex-col lg:flex-row">

    <div class="lg:hidden flex items-center justify-between bg-white border-b border-[#c8e7d8] px-4 py-3 sticky top-0 z-30 shadow-sm">
        <div class="flex items-center gap-2">
            <flux:sidebar.toggle class="!hidden lg:!flex" />
            <button type="button" onclick="document.querySelector('ui-sidebar').dispatchEvent(new CustomEvent('flux-sidebar-toggle',{bubbles:!0}))" class="p-1 -ml-1 rounded hover:bg-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-[#4e5e72]">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
            <img src="{{ asset('img/logoJacoto.png') }}" alt="Jacoto" class="h-7">
            <span class="text-sm font-semibold">Admin</span>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('home') }}" style="color:#4e5e72!important" class="text-xs hover:text-[#FC9B67] font-medium">Web</a>
            <form action="{{ route('logout') }}" method="POST" class="inline">@csrf
                <button type="submit" class="text-xs text-red-600 hover:text-red-800 font-medium">Salir</button>
            </form>
        </div>
    </div>

    <flux:sidebar stashable sticky class="border-r border-[#c8e7d8]">
        <flux:sidebar.brand href="{{ route('admin.dashboard') }}">
            <img src="{{ asset('img/logoJacoto.png') }}" alt="Jacoto" class="h-8">
        </flux:sidebar.brand>

        <flux:navlist>
            <flux:navlist.item icon="chart-bar-square" href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.dashboard')">
                Dashboard
            </flux:navlist.item>
            <flux:navlist.item icon="users" href="{{ route('admin.clientes.index') }}" :active="request()->routeIs('admin.clientes.*')">
                Clientes
            </flux:navlist.item>
            <flux:navlist.item icon="photo" href="{{ route('admin.books.index') }}" :active="request()->routeIs('admin.books.*')">
                Books
            </flux:navlist.item>
            <flux:navlist.item icon="envelope" href="{{ route('admin.mensajes') }}" :active="request()->routeIs('admin.mensajes')">
                Mensajes
            </flux:navlist.item>
            <flux:navlist.item icon="cog-6-tooth" href="{{ route('admin.settings') }}" :active="request()->routeIs('admin.settings')">
                Configuración
            </flux:navlist.item>
        </flux:navlist>

        <flux:sidebar.toggle class="mt-auto" />

        <flux:navlist class="mt-auto">
            <flux:navlist.item icon="arrow-left-end-on-rectangle" href="{{ route('home') }}">
                Volver al sitio
            </flux:navlist.item>
            <flux:navlist.item icon="arrow-right-end-on-rectangle" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
                Cerrar sesión
            </flux:navlist.item>
        </flux:navlist>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
    </flux:sidebar>

    <div class="flex-1 p-4 lg:p-6 overflow-auto">
        @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-sm">{{ session('success') }}</div>
        @endif
        @yield('content')
    </div>

    @fluxScripts
    <script>
    window.localStorage.setItem('flux.appearance','light');
    (function() {
        function fixAdmin() {
            document.documentElement.classList.remove('dark');
            document.documentElement.style.setProperty('color-scheme','light');
            document.querySelectorAll('ui-sidebar, [data-flux-sidebar], [data-flux-navlist-item], dialog, [data-flux-flyout]').forEach(function(el) {
                el.style.setProperty('background','#fff','important');
                el.style.setProperty('color','#4e5e72','important');
            });
            document.querySelectorAll('[data-flux-navlist-item] a, [data-flux-sidebar-brand] a, [data-flux-sidebar-brand]').forEach(function(el) {
                el.style.setProperty('color','#4e5e72','important');
            });
            document.querySelectorAll('[data-flux-navlist-item] a:hover').forEach(function(el) {
                el.style.setProperty('color','#FC9B67','important');
            });
        }
        fixAdmin();
        new MutationObserver(fixAdmin).observe(document.documentElement, { attributes: true, childList: true, subtree: true });
    })();
    </script>
</body>
</html>
