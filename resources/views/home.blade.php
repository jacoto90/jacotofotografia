@extends('layouts.app')

@section('title', 'Inicio')
@section('description', 'Jacoto Fotografía - Fotografía profesional en la Costa Brava. Bodas, eventos, sesiones y más. Capturamos tus momentos más especiales.')

@section('content')
<style>
    .hero-parallax {
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    .testimonial-card {
        transition: all 0.3s ease;
    }
    .testimonial-card:hover {
        transform: translateY(-4px);
    }
    .gallery-item {
        overflow: hidden;
        position: relative;
        border-radius: 0.75rem;
        cursor: pointer;
    }
    .gallery-item img {
        transition: transform 0.6s ease;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .gallery-item:hover img {
        transform: scale(1.08);
    }
    .gallery-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.6) 0%, transparent 60%);
        opacity: 0;
        transition: opacity 0.4s ease;
        display: flex;
        align-items: flex-end;
        padding: 1.5rem;
    }
    .gallery-item:hover .gallery-overlay {
        opacity: 1;
    }
    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-up {
        animation: fadeUp 0.8s ease forwards;
    }
    .delay-100 { animation-delay: 0.1s; }
    .delay-200 { animation-delay: 0.2s; }
    .delay-300 { animation-delay: 0.3s; }
    .delay-400 { animation-delay: 0.4s; }
    .stat-number {
        font-size: 2.5rem;
        font-weight: 700;
        color: #FC9B67;
        line-height: 1;
    }
    @media (max-width: 768px) {
        .stat-number { font-size: 2rem; }
        .hero-parallax { background-attachment: scroll; }
    }
</style>

{{-- Hero --}}
<section class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0">
        <img src="{{ asset('img/bodas.jpg') }}" alt="Jacoto Fotografía" class="w-full h-full object-cover hero-parallax">
        <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/50 to-black/70"></div>
    </div>
    <div class="relative z-10 text-center px-4 sm:px-6 max-w-4xl mx-auto">
        <h1 class="text-4xl sm:text-5xl md:text-7xl font-bold text-white leading-tight mb-6 animate-fade-up">
            Jacoto <span class="text-[#FC9B67]">Fotografía</span>
        </h1>
        <p class="text-lg sm:text-xl text-white/80 max-w-2xl mx-auto mb-10 animate-fade-up delay-200 leading-relaxed">
            Capturo la esencia de tus momentos más especiales con sensibilidad, creatividad y pasión. Bodas, eventos y sesiones únicas en la Costa Brava.
        </p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 animate-fade-up delay-300">
            <a href="{{ route('clientes') }}" class="inline-flex items-center gap-2 px-8 py-3.5 bg-[#FC9B67] text-white font-semibold rounded-full hover:bg-[#e88950] transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                Ver galerías
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
            <a href="{{ route('contacto') }}" class="inline-flex items-center gap-2 px-8 py-3.5 border-2 border-white/30 text-white font-semibold rounded-full hover:bg-white/10 hover:border-white/50 transition-all duration-300">
                Contáctame
            </a>
        </div>
    </div>
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
        <svg class="w-6 h-6 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
    </div>
</section>

{{-- Stats --}}
<section class="bg-[#4e5e72] py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div>
                <div class="stat-number">+5</div>
                <p class="text-white/70 text-sm mt-2 uppercase tracking-wider">Años de experiencia</p>
            </div>
            <div>
                <div class="stat-number">+20</div>
                <p class="text-white/70 text-sm mt-2 uppercase tracking-wider">Eventos capturados</p>
            </div>
            <div>
                <div class="stat-number">+15</div>
                <p class="text-white/70 text-sm mt-2 uppercase tracking-wider">Clientes felices</p>
            </div>
            <div>
                <div class="stat-number">+10k</div>
                <p class="text-white/70 text-sm mt-2 uppercase tracking-wider">Fotos entregadas</p>
            </div>
        </div>
    </div>
</section>

{{-- About --}}
<section class="py-20 sm:py-28 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div>
                <span class="text-[#FC9B67] font-semibold text-sm uppercase tracking-widest">Sobre mí</span>
                <h2 class="text-3xl sm:text-4xl font-bold text-[#4e5e72] mt-3 mb-6 leading-tight">
                    Capturando emociones,<br>creando recuerdos
                </h2>
                <p class="text-gray-600 leading-relaxed mb-4">
                    Soy José Ángel, fotógrafo profesional en la Costa Brava. Para mí, cada sesión es una historia nueva que merece ser contada con luz, sensibilidad y verdad. Me enamoré de la fotografía buscando capturar paisajes y atardeceres, y pronto descubrí que mi verdadera pasión era inmortalizar las emociones de las personas.
                </p>
                <p class="text-gray-600 leading-relaxed mb-4">
                    Me gusta trabajar de forma cercana y natural, adaptándome a cada cliente para que se sienta cómodo y pueda ser él mismo. Desde una boda íntima hasta un evento corporativo, pongo todo mi cuidado en cada detalle para que el resultado sea auténtico y de calidad.
                </p>
                <p class="text-gray-600 leading-relaxed mb-6">
                    Además, como desarrollador full stack, construyo yo mismo las herramientas digitales que rodean la experiencia Jacoto, porque creo que la tecnología y el arte deben caminar de la mano.
                </p>
                <a href="{{ route('jacoto') }}" class="inline-flex items-center gap-2 text-[#4e5e72] font-semibold hover:text-[#FC9B67] transition-colors group">
                    Conoce más
                    <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
            <div class="relative">
                <img src="{{ asset('img/jose.jpg') }}" alt="Jacoto Fotografía" class="rounded-2xl shadow-xl w-full object-cover h-[400px] sm:h-[500px]">
                <div class="absolute -bottom-4 -left-4 bg-[#c8e7d8] rounded-2xl p-6 shadow-lg max-w-[200px]">
                    <p class="text-[#4e5e72] font-semibold text-sm">José Ángel</p>
                    <p class="text-[#4e5e72]/60 text-xs">Fotógrafo & Creador</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Services --}}
<section class="py-20 sm:py-28 bg-[#f8faf9]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-16">
            <span class="text-[#FC9B67] font-semibold text-sm uppercase tracking-widest">Servicios</span>
            <h2 class="text-3xl sm:text-4xl font-bold text-[#4e5e72] mt-3">Lo que ofrezco</h2>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 max-w-5xl mx-auto">
            <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 text-center group">
                <div class="w-20 h-20 bg-gradient-to-br from-[#c8e7d8] to-[#b0d4c0] rounded-2xl flex items-center justify-center mx-auto mb-5 shadow-md group-hover:shadow-lg group-hover:scale-110 transition-all duration-300 relative overflow-hidden">
                    <div class="absolute inset-0 bg-white/0 group-hover:bg-white/10 transition-colors duration-300"></div>
                    <svg class="w-10 h-10 text-[#4e5e72]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <circle cx="12" cy="13" r="5" stroke-width="1.5"/>
                        <path d="M12 5l1.8 2.3-1.8 2.2-1.8-2.2L12 5z" stroke-width="1.3" fill="currentColor" fill-opacity="0.18"/>
                        <path d="M7.5 11l-.8.8M7.8 11l-1 .6" stroke-width="1.3" stroke-linecap="round"/>
                        <path d="M16.5 11l.8.8M16.2 11l1 .6" stroke-width="1.3" stroke-linecap="round"/>
                        <path d="M4.5 7.5l.8.8M5.3 7.5l-.8.8" stroke-width="1.2" stroke-linecap="round"/>
                        <path d="M19.5 15l.8.8M20.3 15l-.8.8" stroke-width="1.2" stroke-linecap="round"/>
                        <path d="M12 18.5v2" stroke-width="1.3" stroke-linecap="round"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-[#4e5e72] mb-2">Bodas</h3>
                <p class="text-gray-500 text-sm leading-relaxed">Acompaño cada boda con un reportaje natural y emocional, capturando los momentos que de verdad importan. Me gusta pasar desapercibido para que todo fluya con naturalidad.</p>
            </div>
            <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 text-center group">
                <div class="w-20 h-20 bg-gradient-to-br from-[#e88950] to-[#c06a35] rounded-2xl flex items-center justify-center mx-auto mb-5 shadow-md group-hover:shadow-lg group-hover:scale-110 transition-all duration-300 relative overflow-hidden">
                    <div class="absolute inset-0 bg-white/0 group-hover:bg-white/10 transition-colors duration-300"></div>
                    <svg class="w-10 h-10 text-[#4e5e72]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="5" stroke-width="1.8"/>
                        <circle cx="12" cy="12" r="2" stroke-width="1.5" fill="currentColor" fill-opacity="0.25"/>
                        <path d="M12 1.5v3M12 19.5v3M1.5 12h3M19.5 12h3M4.5 4.5l2 2M17.5 17.5l2 2M4.5 19.5l2-2M17.5 6.5l2-2" stroke-width="1.8" stroke-linecap="round"/>
                        <path d="M8 12h8M12 8v8" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-[#4e5e72] mb-2">Eventos</h3>
                <p class="text-gray-500 text-sm leading-relaxed">Cubro eventos corporativos y celebraciones con un enfoque dinámico y profesional. Me adapto al ritmo de cada evento para capturar su esencia sin interferir.</p>
            </div>
            <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 text-center group">
                <div class="w-20 h-20 bg-gradient-to-br from-[#4e5e72] to-[#3d4a5a] rounded-2xl flex items-center justify-center mx-auto mb-5 shadow-md group-hover:shadow-lg group-hover:scale-110 transition-all duration-300 relative overflow-hidden">
                    <div class="absolute inset-0 bg-white/0 group-hover:bg-white/10 transition-colors duration-300"></div>
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <rect x="3.5" y="7.5" width="17" height="11" rx="2.5" stroke-width="1.5"/>
                        <path d="M7.5 7.5l1-3h7l1 3" stroke-width="1.5"/>
                        <circle cx="12" cy="14" r="4" stroke-width="1.5"/>
                        <circle cx="12" cy="14" r="1.8" stroke-width="1.2" fill="currentColor" fill-opacity="0.2"/>
                        <circle cx="17.5" cy="11" r="1" stroke-width="1.2"/>
                        <path d="M18 4l.8.8M18.8 4l-.8.8" stroke-width="1.5" stroke-linecap="round"/>
                        <path d="M5 4l.6.6M5.6 4l-.6.6" stroke-width="1.3" stroke-linecap="round"/>
                        <path d="M20 21l.7.7M20.7 21l-.7.7" stroke-width="1.3" stroke-linecap="round"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-[#4e5e72] mb-2">Sesiones personalizadas</h3>
                <p class="text-gray-500 text-sm leading-relaxed">Desde retratos individuales hasta sesiones de pareja o familia. Escucho lo que buscas y creamos juntos una sesión a tu medida, en el entorno que mejor te represente.</p>
            </div>
        </div>
    </div>
</section>

{{-- Workflow --}}
<section class="py-20 sm:py-28 bg-white relative overflow-hidden" id="workflow-section">
    <style>
        .wf-hidden { opacity:0; transform:translateY(40px); }
        .wf-left { opacity:0; transform:translateX(-50px); }
        .wf-right { opacity:0; transform:translateX(50px); }
        .wf-icon { opacity:0; transform:scale(0); }
        .wf-visible { animation:wfFadeUp .8s ease forwards; }
        .wf-left-visible { animation:wfSlideLeft .8s ease forwards; }
        .wf-right-visible { animation:wfSlideRight .8s ease forwards; }
        .wf-icon-visible { animation:wfScaleIn .6s ease forwards; }
        .wf-line-progress { transition:height 1.4s ease; }
        .wf-pulse { animation:wfPulse 2s ease-in-out infinite; }
        .wf-delay-1 { animation-delay:.15s; }
        .wf-delay-2 { animation-delay:.3s; }
        .wf-delay-3 { animation-delay:.45s; }
        .wf-delay-4 { animation-delay:.6s; }
        .wf-delay-5 { animation-delay:.75s; }
        @keyframes wfFadeUp { to { opacity:1; transform:translateY(0); } }
        @keyframes wfSlideLeft { to { opacity:1; transform:translateX(0); } }
        @keyframes wfSlideRight { to { opacity:1; transform:translateX(0); } }
        @keyframes wfScaleIn { to { opacity:1; transform:scale(1); } }
        @keyframes wfPulse { 0%,100% { box-shadow:0 0 0 0 rgba(78,94,114,.3); } 50% { box-shadow:0 0 0 14px rgba(78,94,114,0); } }
        @keyframes wfLineGrow { from { height:0; } to { height:var(--target-height); } }
    </style>

    <div class="absolute top-0 right-0 w-96 h-96 bg-[#c8e7d8]/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-80 h-80 bg-[#FC9B67]/5 rounded-full blur-3xl"></div>
    <div class="max-w-5xl mx-auto px-4 sm:px-6 relative z-10">
        <div class="text-center mb-16 wf-hidden" data-animate="fade">
            <span class="text-[#FC9B67] font-semibold text-base uppercase tracking-widest">Valor diferencial</span>
            <h2 class="text-4xl sm:text-5xl font-bold text-[#4e5e72] mt-4 leading-tight">Tus fotos hechas,<br>y aquí las tienes</h2>
            <p class="text-gray-500 text-lg mt-4 max-w-2xl mx-auto leading-relaxed">
                Te hago las fotos, las edito y las subo a tu galería privada en esta web. 
                Sin USBs, sin WeTransfer que caduca, sin tener que pedirme las fotos una a una. 
                Todo online, siempre accesible, organizado y listo para descargar.
            </p>
        </div>

        <div class="relative">
            <div class="hidden md:block absolute left-1/2 top-0 bottom-0 w-0.5 bg-[#c8e7d8]/30 -translate-x-1/2"></div>
            <div id="wf-line-fill" class="hidden md:block absolute left-1/2 top-0 w-0.5 bg-gradient-to-b from-[#FC9B67] via-[#c8e7d8] to-[#4e5e72] -translate-x-1/2" style="height:0;"></div>

            <div class="space-y-16 md:space-y-20">
                <div class="relative flex flex-col md:flex-row items-center gap-8 md:gap-12 wf-step" data-step="1">
                    <div class="hidden md:flex w-1/2 justify-end">
                        <div class="text-right wf-left" data-animate="left">
                            <span class="text-base font-bold text-[#FC9B67]">Paso 1</span>
                            <h3 class="text-2xl font-bold text-[#4e5e72] mt-1">La sesión de fotos</h3>
                            <p class="text-gray-500 text-base mt-3 leading-relaxed max-w-sm ml-auto">
                                Quedamos en el lugar que elijas — estudio, exterior, tu evento, lo que sea. 
                                Trabajo con naturalidad para que te sientas cómodo y las fotos reflejen 
                                quién eres de verdad. Sin poses forzadas, sin prisas.
                            </p>
                        </div>
                    </div>
                    <div class="relative z-10 flex-shrink-0">
                        <div class="w-16 h-16 md:w-20 md:h-20 bg-gradient-to-br from-[#c8e7d8] to-[#b0d4c0] rounded-2xl flex items-center justify-center shadow-lg md:absolute md:left-1/2 md:-translate-x-1/2 wf-icon" data-animate="icon">
                            <svg class="w-8 h-8 md:w-10 md:h-10 text-[#4e5e72]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.16a15.53 15.53 0 01-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="md:hidden text-center wf-hidden" data-animate="fade">
                        <span class="text-base font-bold text-[#FC9B67]">Paso 1</span>
                        <h3 class="text-2xl font-bold text-[#4e5e72] mt-1">La sesión de fotos</h3>
                        <p class="text-gray-500 text-base mt-3 leading-relaxed">
                            Quedamos en el lugar que elijas — estudio, exterior, tu evento, lo que sea. 
                            Trabajo con naturalidad para que te sientas cómodo y las fotos reflejen 
                            quién eres de verdad. Sin poses forzadas, sin prisas.
                        </p>
                    </div>
                    <div class="hidden md:flex w-1/2"></div>
                </div>

                <div class="relative flex flex-col md:flex-row items-center gap-8 md:gap-12 wf-step" data-step="2">
                    <div class="hidden md:flex w-1/2"></div>
                    <div class="relative z-10 flex-shrink-0">
                        <div class="w-16 h-16 md:w-20 md:h-20 bg-gradient-to-br from-[#FC9B67] to-[#e88950] rounded-2xl flex items-center justify-center shadow-lg md:absolute md:left-1/2 md:-translate-x-1/2 wf-icon" data-animate="icon">
                            <svg class="w-8 h-8 md:w-10 md:h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.455 2.456L21.75 6l-1.036.259a3.375 3.375 0 00-2.455 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="text-center md:text-left md:w-1/2 wf-right" data-animate="right">
                        <span class="text-base font-bold text-[#FC9B67]">Paso 2</span>
                        <h3 class="text-2xl font-bold text-[#4e5e72] mt-1">Edición profesional</h3>
                        <p class="text-gray-500 text-base mt-3 leading-relaxed md:max-w-sm">
                            Selecciono las mejores tomas y las edito una a una con mimo: 
                            ajuste de color, luz, encuadre y retoque si es necesario. 
                            Cada foto sale con la calidad que merece tu recuerdo. 
                            Tiempo estimado de entrega: entre 7 y 10 días.
                        </p>
                    </div>
                </div>

                <div class="relative flex flex-col md:flex-row items-center gap-8 md:gap-12 wf-step" data-step="3">
                    <div class="hidden md:flex w-1/2 justify-end">
                        <div class="text-right wf-left" data-animate="left">
                            <span class="text-base font-bold text-[#FC9B67]">Paso 3</span>
                            <h3 class="text-2xl font-bold text-[#4e5e72] mt-1">Galería privada online</h3>
                            <p class="text-gray-500 text-base mt-3 leading-relaxed max-w-sm ml-auto">
                                Recibes un enlace único con tu contraseña personal para acceder 
                                a tu galería desde cualquier dispositivo. Sin registros, sin apps, 
                                sin complicaciones. Tus fotos organizadas y protegidas, solo visibles 
                                para ti y quien tú quieras compartirlas.
                            </p>
                        </div>
                    </div>
                    <div class="relative z-10 flex-shrink-0">
                        <div class="w-16 h-16 md:w-20 md:h-20 bg-gradient-to-br from-[#4e5e72] to-[#3d4a5a] rounded-2xl flex items-center justify-center shadow-lg md:absolute md:left-1/2 md:-translate-x-1/2 wf-icon" data-animate="icon">
                            <svg class="w-8 h-8 md:w-10 md:h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="md:hidden text-center wf-hidden" data-animate="fade">
                        <span class="text-base font-bold text-[#FC9B67]">Paso 3</span>
                        <h3 class="text-2xl font-bold text-[#4e5e72] mt-1">Galería privada online</h3>
                        <p class="text-gray-500 text-base mt-3 leading-relaxed">
                            Recibes un enlace único con tu contraseña personal para acceder 
                            a tu galería desde cualquier dispositivo. Sin registros, sin apps, 
                            sin complicaciones. Tus fotos organizadas y protegidas, solo visibles 
                            para ti y quien tú quieras compartirlas.
                        </p>
                    </div>
                </div>

                <div class="relative flex flex-col md:flex-row items-center gap-8 md:gap-12 wf-step" data-step="4">
                    <div class="hidden md:flex w-1/2"></div>
                    <div class="relative z-10 flex-shrink-0">
                        <div class="w-16 h-16 md:w-20 md:h-20 bg-gradient-to-br from-[#c8e7d8] to-[#b0d4c0] rounded-2xl flex items-center justify-center shadow-lg md:absolute md:left-1/2 md:-translate-x-1/2 wf-icon" data-animate="icon">
                            <svg class="w-8 h-8 md:w-10 md:h-10 text-[#4e5e72]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3"/>
                            </svg>
                        </div>
                    </div>
                    <div class="text-center md:text-left md:w-1/2 wf-right" data-animate="right">
                        <span class="text-base font-bold text-[#FC9B67]">Paso 4</span>
                        <h3 class="text-2xl font-bold text-[#4e5e72] mt-1">Descarga directa</h3>
                        <p class="text-gray-500 text-base mt-3 leading-relaxed md:max-w-sm">
                            Elige las fotos que más te gusten y descárgalas en alta resolución 
                            con un clic. También puedes descargar el álbum completo en ZIP. 
                            Sin límites, sin caducidad. Tus fotos, siempre disponibles.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-16 p-8 md:p-10 bg-[#f8faf9] rounded-2xl border border-[#c8e7d8]/30 max-w-3xl mx-auto wf-hidden" data-animate="fade">
            <div class="w-14 h-14 bg-[#c8e7d8] rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-7 h-7 text-[#4e5e72]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09z"/>
                </svg>
            </div>
            <p class="text-[#4e5e72] font-semibold text-lg leading-relaxed">
                Mientras otros fotógrafos te mandan un USB o un link de WeTransfer que caduca a los pocos días, 
                aquí tus fotos tienen su propio espacio en la web, siempre accesibles, siempre tuyas. 
                <strong>Eso no lo hace todo el mundo.</strong>
            </p>
        </div>

        <div class="text-center mt-10 wf-hidden" data-animate="fade">
            <a href="{{ route('contacto') }}" class="inline-flex items-center gap-2 px-10 py-4 bg-[#FC9B67] text-white font-bold rounded-full hover:bg-[#e88950] transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-0.5 text-lg">
                Quiero mi galería
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </div>

    <script>
        (function(){
            var section = document.getElementById('workflow-section');
            var animTargets = section.querySelectorAll('[data-animate]');
            var lineFill = document.getElementById('wf-line-fill');
            var lineContainer = lineFill ? lineFill.parentElement : null;

            function isInView(el, offset) {
                offset = offset || 0.8;
                var rect = el.getBoundingClientRect();
                var vh = window.innerHeight;
                return rect.top < vh * offset && rect.bottom > 0;
            }

            function updateLine() {
                if (!lineFill || !lineContainer) return;
                var steps = section.querySelectorAll('.wf-step');
                var firstStep = steps[0];
                var lastStep = steps[steps.length - 1];
                if (!firstStep || !lastStep) return;
                var containerRect = lineContainer.getBoundingClientRect();
                var firstRect = firstStep.getBoundingClientRect();
                var lastRect = lastStep.getBoundingClientRect();
                var startY = firstRect.top - containerRect.top + firstRect.height / 2;
                var endY = lastRect.top - containerRect.top + lastRect.height / 2;
                var totalH = endY - startY;
                var scrolled = Math.min(Math.max((window.innerHeight * 0.7 - firstRect.top) / (firstRect.top + firstRect.height - window.innerHeight * 0.7 + totalH), 0), 1);
                lineFill.style.height = Math.max(0, (startY + totalH * scrolled) - startY) + 'px';
                lineFill.style.top = startY + 'px';
            }

            function animate() {
                animTargets.forEach(function(el) {
                    if (isInView(el) && !el.classList.contains('done')) {
                        el.classList.add('done');
                        var anim = el.dataset.animate;
                        if (anim === 'fade') el.classList.add('wf-visible');
                        else if (anim === 'left') el.classList.add('wf-left-visible');
                        else if (anim === 'right') el.classList.add('wf-right-visible');
                        else if (anim === 'icon') {
                            el.classList.add('wf-icon-visible');
                            setTimeout(function(){ el.classList.add('wf-pulse'); }, 700);
                        }
                    }
                });
                updateLine();
            }

            window.addEventListener('scroll', animate, { passive: true });
            window.addEventListener('resize', animate, { passive: true });
            animate();
        })();
    </script>
</section>

{{-- Gallery --}}
@php
    $allGalleryImages = array_merge($carousel1, $carousel2);
    shuffle($allGalleryImages);
    $galleryImages = array_slice($allGalleryImages, 0, 9);
@endphp
@if(count($galleryImages) > 0)
<section class="py-20 sm:py-28 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-16">
            <span class="text-[#FC9B67] font-semibold text-sm uppercase tracking-widest">Portfolio</span>
            <h2 class="text-3xl sm:text-4xl font-bold text-[#4e5e72] mt-3">Momentos capturados</h2>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach($galleryImages as $index => $image)
            <div class="gallery-item {{ $index === 0 ? 'col-span-2 row-span-2' : '' }}" onclick="openLightbox({{ $index }})">
                <img src="{{ asset($image) }}" alt="Jacoto Fotografía" loading="lazy" class="{{ $index === 0 ? 'h-full' : 'h-48 sm:h-56' }}">
                <div class="gallery-overlay">
                    <span class="text-white text-sm font-medium">Ver foto</span>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-10">
            <a href="{{ route('clientes') }}" class="inline-flex items-center gap-2 px-8 py-3.5 bg-[#4e5e72] text-white font-semibold rounded-full hover:bg-[#3d4a5a] transition-all duration-300">
                Ver todas las galerías
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </div>
</section>
@endif

{{-- Testimonials --}}
<section class="py-20 sm:py-28 bg-[#f8faf9]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-16">
            <span class="text-[#FC9B67] font-semibold text-sm uppercase tracking-widest">Testimonios</span>
            <h2 class="text-3xl sm:text-4xl font-bold text-[#4e5e72] mt-3">Lo que dicen mis clientes</h2>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="testimonial-card bg-white rounded-2xl p-8 shadow-sm">
                <div class="flex gap-1 mb-4">
                    @for($i = 0; $i < 5; $i++)
                    <svg class="w-5 h-5 text-[#FC9B67]" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    @endfor
                </div>
                <p class="text-gray-600 text-sm leading-relaxed mb-4">"Muy contenta con el resultado del evento de Trafic de SEO. José Ángel supo captar la esencia del networking y la energía del encuentro. Las fotos quedaron geniales y todos los asistentes quedaron encantados."</p>
                <div>
                    <p class="font-semibold text-[#4e5e72] text-sm">Laura</p>
                    <p class="text-gray-400 text-xs">Evento Trafic de SEO, 2024</p>
                </div>
            </div>
            <div class="testimonial-card bg-white rounded-2xl p-8 shadow-sm">
                <div class="flex gap-1 mb-4">
                    @for($i = 0; $i < 5; $i++)
                    <svg class="w-5 h-5 text-[#FC9B67]" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    @endfor
                </div>
                <p class="text-gray-600 text-sm leading-relaxed mb-4">"Muy profesional y cercano. Hizo que todos los invitados se sintieran cómodos. El resultado fue espectacular. Totalmente recomendado."</p>
                <div>
                    <p class="font-semibold text-[#4e5e72] text-sm">Sandra & Darío</p>
                    <p class="text-gray-400 text-xs">Boda, Octubre 2022</p>
                </div>
            </div>
            <div class="testimonial-card bg-white rounded-2xl p-8 shadow-sm">
                <div class="flex gap-1 mb-4">
                    @for($i = 0; $i < 5; $i++)
                    <svg class="w-5 h-5 text-[#FC9B67]" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    @endfor
                </div>
                <p class="text-gray-600 text-sm leading-relaxed mb-4">"Gran experiencia con la sesión de fotos. Supo capturar exactamente lo que queríamos. Muy agradecidos por el trato y la calidad del trabajo."</p>
                <div>
                    <p class="font-semibold text-[#4e5e72] text-sm">Dani</p>
                    <p class="text-gray-400 text-xs">Sesión, Girona</p>
                </div>
            </div>
            <div class="testimonial-card bg-white rounded-2xl p-8 shadow-sm">
                <div class="flex gap-1 mb-4">
                    @for($i = 0; $i < 5; $i++)
                    <svg class="w-5 h-5 text-[#FC9B67]" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    @endfor
                </div>
                <p class="text-gray-600 text-sm leading-relaxed mb-4">"Increíble experiencia en el bautizo de golf y el show room de productos One Soul. Las fotos reflejan perfectamente la esencia de ambos eventos. Muy profesional y atento a cada detalle. Sin duda repetiremos."</p>
                <div>
                    <p class="font-semibold text-[#4e5e72] text-sm">Sandra</p>
                    <p class="text-gray-400 text-xs">Bautizo de Golf & Show Room One Soul, 2024</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="relative py-24 overflow-hidden">
    <div class="absolute inset-0">
        <img src="{{ asset('img/paisajes.jpg') }}" alt="" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-[#4e5e72]/95 to-[#4e5e72]/80"></div>
    </div>
    <div class="relative z-10 max-w-3xl mx-auto px-4 sm:px-6 text-center">
        <h2 class="text-3xl sm:text-4xl font-bold text-white mb-4">¿Listo para contar tu historia?</h2>
        <p class="text-white/70 text-lg mb-8 leading-relaxed">Cuéntame sobre tu proyecto y te prepararé un presupuesto personalizado sin compromiso.</p>
        <a href="{{ route('contacto') }}" class="inline-flex items-center gap-2 px-10 py-4 bg-[#FC9B67] text-white font-semibold rounded-full hover:bg-[#e88950] transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-0.5 text-lg">
            Solicita tu presupuesto
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
        </a>
    </div>
</section>
@if(count($galleryImages) > 0)
@push('scripts')
<script>
    const lightboxImages = @json(array_map(fn($img) => asset($img), $galleryImages));
    let currentIndex = 0;

    function updateCounter() {
        document.getElementById('lightbox-counter').textContent = currentIndex + 1;
        document.getElementById('lightbox-total').textContent = lightboxImages.length;
    }

    function openLightbox(index) {
        currentIndex = index;
        document.getElementById('lightbox-img').src = lightboxImages[currentIndex];
        document.getElementById('lightbox').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
        updateCounter();
    }

    function closeLightbox() {
        document.getElementById('lightbox').classList.add('hidden');
        document.body.style.overflow = '';
    }

    function prevImage(e) {
        e.stopPropagation();
        currentIndex = (currentIndex - 1 + lightboxImages.length) % lightboxImages.length;
        document.getElementById('lightbox-img').src = lightboxImages[currentIndex];
        updateCounter();
    }

    function nextImage(e) {
        e.stopPropagation();
        currentIndex = (currentIndex + 1) % lightboxImages.length;
        document.getElementById('lightbox-img').src = lightboxImages[currentIndex];
        updateCounter();
    }

    document.addEventListener('keydown', function(e) {
        if (document.getElementById('lightbox').classList.contains('hidden')) return;
        if (e.key === 'Escape') closeLightbox();
        if (e.key === 'ArrowLeft') { e.preventDefault(); currentIndex = (currentIndex - 1 + lightboxImages.length) % lightboxImages.length; document.getElementById('lightbox-img').src = lightboxImages[currentIndex]; updateCounter(); }
        if (e.key === 'ArrowRight') { e.preventDefault(); currentIndex = (currentIndex + 1) % lightboxImages.length; document.getElementById('lightbox-img').src = lightboxImages[currentIndex]; updateCounter(); }
    });
</script>
@endpush

<div id="lightbox" class="fixed inset-0 z-[100] hidden bg-black/95 flex items-center justify-center" onclick="closeLightbox()">
    <button onclick="closeLightbox()" class="absolute top-4 right-4 text-white/70 hover:text-white transition-colors z-10">
        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
    </button>
    <button onclick="prevImage(event)" class="absolute left-4 text-white/70 hover:text-white transition-colors z-10">
        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
    </button>
    <button onclick="nextImage(event)" class="absolute right-4 text-white/70 hover:text-white transition-colors z-10">
        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
    </button>
    <div class="max-w-5xl max-h-[90vh] mx-4" onclick="event.stopPropagation()">
        <img id="lightbox-img" src="" alt="Jacoto Fotografía" class="max-w-full max-h-[90vh] object-contain rounded-lg shadow-2xl">
    </div>
    <div class="absolute bottom-6 text-white/50 text-sm">(<span id="lightbox-counter">1</span>/<span id="lightbox-total">1</span>)</div>
</div>
@endif
@endsection
