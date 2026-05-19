@props(['active' => 'home'])

<header class="bg-white/95 backdrop-blur-sm border-b border-[#c8e7d8]/40 fixed top-0 left-0 w-full z-50 transition-all duration-300" x-data="{ scrolled: false, mobileOpen: false }" x-init="window.addEventListener('scroll', () => scrolled = window.scrollY > 20)">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex items-center justify-between h-20">
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <img src="{{ asset('img/logoJacoto.png') }}" alt="Jacoto Fotografía" class="h-10 sm:h-12 transition-transform duration-300 group-hover:scale-105">
            </a>

            <nav class="hidden md:flex items-center gap-1">
                <a href="{{ route('home') }}" class="px-4 py-2 text-sm font-medium rounded-full transition-all duration-200 {{ request()->routeIs('home') ? 'text-white bg-[#4e5e72]' : 'text-[#4e5e72] hover:text-[#FC9B67] hover:bg-orange-50' }}">
                    Home
                </a>
                <a href="{{ route('clientes') }}" class="px-4 py-2 text-sm font-medium rounded-full transition-all duration-200 {{ request()->routeIs('clientes') ? 'text-white bg-[#4e5e72]' : 'text-[#4e5e72] hover:text-[#FC9B67] hover:bg-orange-50' }}">
                    Clientes
                </a>
                <a href="{{ route('jacoto') }}" class="px-4 py-2 text-sm font-medium rounded-full transition-all duration-200 {{ request()->routeIs('jacoto') ? 'text-white bg-[#4e5e72]' : 'text-[#4e5e72] hover:text-[#FC9B67] hover:bg-orange-50' }}">
                    Jacoto
                </a>
                <a href="{{ route('contacto') }}" class="px-4 py-2 text-sm font-medium rounded-full transition-all duration-200 {{ request()->routeIs('contacto') ? 'text-white bg-[#4e5e72]' : 'text-[#4e5e72] hover:text-[#FC9B67] hover:bg-orange-50' }}">
                    Contacto
                </a>
            </nav>

            <button class="md:hidden p-2 rounded-lg text-[#4e5e72] hover:bg-gray-100 transition-colors" @click="mobileOpen = !mobileOpen" aria-label="Menú">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </div>

    <div x-show="mobileOpen" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-4" class="md:hidden border-t border-[#c8e7d8]/40 bg-white/95 backdrop-blur-sm shadow-lg" @click.outside="mobileOpen = false">
        <div class="px-4 py-3 space-y-1">
            <a href="{{ route('home') }}" class="block px-4 py-3 rounded-xl text-sm font-medium {{ request()->routeIs('home') ? 'bg-[#c8e7d8] text-[#4e5e72]' : 'text-[#4e5e72] hover:bg-gray-50' }}">
                Home
            </a>
            <a href="{{ route('clientes') }}" class="block px-4 py-3 rounded-xl text-sm font-medium {{ request()->routeIs('clientes') ? 'bg-[#c8e7d8] text-[#4e5e72]' : 'text-[#4e5e72] hover:bg-gray-50' }}">
                Clientes
            </a>
            <a href="{{ route('jacoto') }}" class="block px-4 py-3 rounded-xl text-sm font-medium {{ request()->routeIs('jacoto') ? 'bg-[#c8e7d8] text-[#4e5e72]' : 'text-[#4e5e72] hover:bg-gray-50' }}">
                Jacoto
            </a>
            <a href="{{ route('contacto') }}" class="block px-4 py-3 rounded-xl text-sm font-medium {{ request()->routeIs('contacto') ? 'bg-[#c8e7d8] text-[#4e5e72]' : 'text-[#4e5e72] hover:bg-gray-50' }}">
                Contacto
            </a>
        </div>
    </div>
</header>
