<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login - Jacoto Fotografía</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>:root{color-scheme:light}</style>
    <script>window.localStorage.setItem('flux.appearance','light');if(window.Flux)window.Flux.applyAppearance('light');</script>
</head>
<body class="bg-[#c8e7d8] min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <div class="text-center mb-6">
            <img src="{{ asset('img/logoJacoto.png') }}" alt="Jacoto" class="h-12 mx-auto mb-2">
            <h1 class="text-xl font-semibold text-[#4e5e72]">Admin</h1>
        </div>

        @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 text-sm">
            {{ $errors->first('email') ?: $errors->first('throttle') }}
        </div>
        @endif

        @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 text-sm">
            {{ session('error') }}
        </div>
        @endif

        <form method="POST" action="{{ route('admin.login.post') }}" class="space-y-4">
            @csrf
            <flux:input label="Email" type="email" name="email" required />
            <flux:input label="Contraseña" type="password" name="password" required />
            <flux:button type="submit" variant="primary" class="w-full">Ingresar</flux:button>
        </form>
    </div>
    @fluxScripts
    <script>window.localStorage.setItem('flux.appearance','light');document.documentElement.classList.remove('dark');document.documentElement.style.setProperty('color-scheme','light');</script>
</body>
</html>
