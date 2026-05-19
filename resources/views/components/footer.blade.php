<footer class="bg-[#4e5e72] text-white/80 mt-auto">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <img src="{{ asset('img/logoJacoto.png') }}" alt="Jacoto Fotografia" class="h-10 brightness-0 invert opacity-90 mb-4">
                <p class="text-sm text-white/60 leading-relaxed">
                    Fotografía profesional en la Costa Brava. Capturamos tus momentos más especiales con sensibilidad y creatividad.
                </p>
            </div>
            <div>
                <h4 class="text-white font-semibold mb-4 text-sm uppercase tracking-wider">Enlaces</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" class="text-sm text-white/60 hover:text-[#FC9B67] transition-colors">Home</a></li>
                    <li><a href="{{ route('clientes') }}" class="text-sm text-white/60 hover:text-[#FC9B67] transition-colors">Clientes</a></li>
                    <li><a href="{{ route('jacoto') }}" class="text-sm text-white/60 hover:text-[#FC9B67] transition-colors">Jacoto</a></li>
                    <li><a href="{{ route('contacto') }}" class="text-sm text-white/60 hover:text-[#FC9B67] transition-colors">Contacto</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white font-semibold mb-4 text-sm uppercase tracking-wider">Legal</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('proteccion.datos') }}" class="text-sm text-white/60 hover:text-[#FC9B67] transition-colors">Protección de Datos</a></li>
                    <li><a href="{{ route('politica.cookies') }}" class="text-sm text-white/60 hover:text-[#FC9B67] transition-colors">Política de Cookies</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white font-semibold mb-4 text-sm uppercase tracking-wider">Contacto</h4>
                <ul class="space-y-2">
                    <li class="text-sm text-white/60">webjacoto@gmail.com</li>
                    <li>
                        <a href="https://www.instagram.com/jacoto_/" target="_blank" rel="noopener" class="text-sm text-white/60 hover:text-[#FC9B67] transition-colors inline-flex items-center gap-2">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                            Instagram
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="border-t border-white/10 mt-8 pt-8 text-center text-sm text-white/40">
            <p>Copyright &copy; {{ date('Y') }} Jacoto Fotografía. Todos los derechos reservados.</p>
        </div>
    </div>
</footer>
