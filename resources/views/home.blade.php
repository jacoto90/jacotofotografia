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
<section class="py-24 sm:py-32 bg-white relative overflow-hidden" id="workflow-section">
    <style>
        .pr-card { opacity:0; transform:translateY(60px) scale(.96); transition:all .8s cubic-bezier(.22,1,.36,1); }
        .pr-card.show { opacity:1; transform:translateY(0) scale(1); }
        .pr-num { opacity:0; transform:translateX(-30px); transition:all .7s cubic-bezier(.22,1,.36,1) .2s; }
        .pr-card.show .pr-num { opacity:1; transform:translateX(0); }
        .pr-body { opacity:0; transform:translateX(30px); transition:all .7s cubic-bezier(.22,1,.36,1) .3s; }
        .pr-card.show .pr-body { opacity:1; transform:translateX(0); }
        .pr-icon { opacity:0; transform:scale(0) rotate(-45deg); transition:all .6s cubic-bezier(.34,1.56,.64,1) .4s; }
        .pr-card.show .pr-icon { opacity:1; transform:scale(1) rotate(0deg); }
        .pr-dot { opacity:0; transform:scale(0); transition:all .5s cubic-bezier(.34,1.56,.64,1) .15s; }
        .pr-card.show .pr-dot { opacity:1; transform:scale(1); }
        .pr-glint { position:absolute; inset:0; background:linear-gradient(105deg,transparent 30%,rgba(255,255,255,.4) 45%,transparent 60%); background-size:200% 100%; background-position:200% 0; }
        .pr-card.show .pr-glint { animation:prShine .8s ease .5s forwards; }
        @keyframes prShine { to { background-position:-200% 0; } }
        @keyframes prLineGrow { from { height:0; } to { height:var(--h); } }
        @keyframes prPulse { 0%,100% { box-shadow:0 0 0 0 rgba(252,155,103,.4); } 50% { box-shadow:0 0 0 16px rgba(252,155,103,0); } }
        .pr-pulse { animation:prPulse 2.5s ease-in-out infinite; }
    </style>

    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-[#c8e7d8]/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-[#FC9B67]/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 relative z-10">
        <div class="text-center mb-20 max-w-3xl mx-auto">
            <span class="inline-flex items-center gap-2 px-4 py-1.5 bg-[#c8e7d8]/40 text-[#4e5e72] text-sm font-semibold rounded-full uppercase tracking-wider">Valor diferencial</span>
            <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-[#4e5e72] mt-8 leading-[1.1] tracking-tight">Tus fotos hechas,<br><span class="text-[#FC9B67]">y aquí las tienes</span></h2>
            <p class="text-gray-500 text-lg sm:text-xl mt-6 leading-relaxed max-w-2xl mx-auto">
                Te hago las fotos, las edito y las subo a tu galería privada en esta web. 
                Sin USBs, sin WeTransfer que caduca, sin tener que pedirme las fotos una a una. 
                <strong class="text-[#4e5e72]">Todo online, siempre accesible.</strong>
            </p>
        </div>

        <div class="relative max-w-4xl mx-auto">
            <div class="hidden md:block absolute left-[52px] lg:left-[60px] top-0 bottom-0 w-px bg-gradient-to-b from-transparent via-[#c8e7d8]/40 to-transparent"></div>
            <div id="pr-line-fill" class="hidden md:block absolute left-[52px] lg:left-[60px] top-0 w-px bg-gradient-to-b from-[#FC9B67] via-[#c8e7d8] to-[#4e5e72]" style="height:0;"></div>

            <div class="space-y-16 md:space-y-24">
                <div class="pr-card" data-delay="0">
                    <div class="flex items-start gap-6 md:gap-8">
                        <div class="relative z-10 flex-shrink-0">
                            <div class="relative">
                                <div class="w-14 h-14 md:w-[52px] md:h-[52px] lg:w-[56px] lg:h-[56px] bg-gradient-to-br from-[#c8e7d8] to-[#b0d4c0] rounded-2xl flex items-center justify-center shadow-lg pr-dot pr-pulse">
                                    <svg class="w-7 h-7 md:w-6 md:h-6 lg:w-7 lg:h-7 text-[#4e5e72]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.16a15.53 15.53 0 01-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg transition-shadow duration-300 overflow-hidden relative">
                                <div class="pr-glint"></div>
                                <div class="p-6 md:p-8">
                                    <div class="flex items-start gap-5 md:gap-8">
                                        <div class="pr-num hidden md:block flex-shrink-0">
                                            <span class="text-6xl lg:text-7xl font-black text-[#c8e7d8]/30 select-none leading-none" style="line-height:.8;">01</span>
                                        </div>
                                        <div class="pr-body flex-1">
                                            <span class="inline-block text-xs font-bold text-[#FC9B67] uppercase tracking-widest mb-2">Paso 1</span>
                                            <h3 class="text-2xl md:text-3xl font-bold text-[#4e5e72]">La sesión de fotos</h3>
                                            <p class="text-gray-500 text-base md:text-lg mt-3 leading-relaxed">
                                                Quedamos en el lugar que elijas — estudio, exterior, tu evento, lo que sea. 
                                                Trabajo con naturalidad para que te sientas cómodo y las fotos reflejen 
                                                quién eres de verdad. Sin poses forzadas, sin prisas.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pr-card" data-delay="100">
                    <div class="flex items-start gap-6 md:gap-8">
                        <div class="relative z-10 flex-shrink-0">
                            <div class="relative">
                                <div class="w-14 h-14 md:w-[52px] md:h-[52px] lg:w-[56px] lg:h-[56px] bg-gradient-to-br from-[#FC9B67] to-[#e88950] rounded-2xl flex items-center justify-center shadow-lg pr-dot pr-pulse">
                                    <svg class="w-7 h-7 md:w-6 md:h-6 lg:w-7 lg:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.455 2.456L21.75 6l-1.036.259a3.375 3.375 0 00-2.455 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg transition-shadow duration-300 overflow-hidden relative">
                                <div class="pr-glint"></div>
                                <div class="p-6 md:p-8">
                                    <div class="flex items-start gap-5 md:gap-8">
                                        <div class="pr-num hidden md:block flex-shrink-0">
                                            <span class="text-6xl lg:text-7xl font-black text-[#FC9B67]/20 select-none leading-none" style="line-height:.8;">02</span>
                                        </div>
                                        <div class="pr-body flex-1">
                                            <span class="inline-block text-xs font-bold text-[#FC9B67] uppercase tracking-widest mb-2">Paso 2</span>
                                            <h3 class="text-2xl md:text-3xl font-bold text-[#4e5e72]">Edición profesional</h3>
                                            <p class="text-gray-500 text-base md:text-lg mt-3 leading-relaxed">
                                                Selecciono las mejores tomas y las edito una a una con mimo: 
                                                ajuste de color, luz, encuadre y retoque si es necesario. 
                                                Cada foto sale con la calidad que merece tu recuerdo. 
                                                <strong>Tiempo estimado de entrega: entre 7 y 10 días.</strong>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pr-card" data-delay="200">
                    <div class="flex items-start gap-6 md:gap-8">
                        <div class="relative z-10 flex-shrink-0">
                            <div class="relative">
                                <div class="w-14 h-14 md:w-[52px] md:h-[52px] lg:w-[56px] lg:h-[56px] bg-gradient-to-br from-[#4e5e72] to-[#3d4a5a] rounded-2xl flex items-center justify-center shadow-lg pr-dot pr-pulse">
                                    <svg class="w-7 h-7 md:w-6 md:h-6 lg:w-7 lg:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg transition-shadow duration-300 overflow-hidden relative">
                                <div class="pr-glint"></div>
                                <div class="p-6 md:p-8">
                                    <div class="flex items-start gap-5 md:gap-8">
                                        <div class="pr-num hidden md:block flex-shrink-0">
                                            <span class="text-6xl lg:text-7xl font-black text-[#4e5e72]/15 select-none leading-none" style="line-height:.8;">03</span>
                                        </div>
                                        <div class="pr-body flex-1">
                                            <span class="inline-block text-xs font-bold text-[#FC9B67] uppercase tracking-widest mb-2">Paso 3</span>
                                            <h3 class="text-2xl md:text-3xl font-bold text-[#4e5e72]">Galería privada online</h3>
                                            <p class="text-gray-500 text-base md:text-lg mt-3 leading-relaxed">
                                                Recibes un enlace único con tu contraseña personal para acceder 
                                                a tu galería desde cualquier dispositivo. Sin registros, sin apps, 
                                                sin complicaciones. Tus fotos organizadas y protegidas, solo visibles 
                                                para ti y quien tú quieras compartirlas.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pr-card" data-delay="300">
                    <div class="flex items-start gap-6 md:gap-8">
                        <div class="relative z-10 flex-shrink-0">
                            <div class="relative">
                                <div class="w-14 h-14 md:w-[52px] md:h-[52px] lg:w-[56px] lg:h-[56px] bg-gradient-to-br from-[#c8e7d8] to-[#b0d4c0] rounded-2xl flex items-center justify-center shadow-lg pr-dot pr-pulse">
                                    <svg class="w-7 h-7 md:w-6 md:h-6 lg:w-7 lg:h-7 text-[#4e5e72]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg transition-shadow duration-300 overflow-hidden relative">
                                <div class="pr-glint"></div>
                                <div class="p-6 md:p-8">
                                    <div class="flex items-start gap-5 md:gap-8">
                                        <div class="pr-num hidden md:block flex-shrink-0">
                                            <span class="text-6xl lg:text-7xl font-black text-[#c8e7d8]/40 select-none leading-none" style="line-height:.8;">04</span>
                                        </div>
                                        <div class="pr-body flex-1">
                                            <span class="inline-block text-xs font-bold text-[#FC9B67] uppercase tracking-widest mb-2">Paso 4</span>
                                            <h3 class="text-2xl md:text-3xl font-bold text-[#4e5e72]">Descarga directa</h3>
                                            <p class="text-gray-500 text-base md:text-lg mt-3 leading-relaxed">
                                                Elige las fotos que más te gusten y descárgalas en alta resolución 
                                                con un clic. También puedes descargar el álbum completo en ZIP. 
                                                <strong>Sin límites, sin caducidad.</strong> Tus fotos, siempre disponibles.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-20 max-w-3xl mx-auto">
            <div class="bg-gradient-to-br from-[#f8faf9] to-white rounded-3xl border border-[#c8e7d8]/30 p-8 md:p-12 shadow-sm">
                <div class="w-16 h-16 bg-gradient-to-br from-[#c8e7d8] to-[#b0d4c0] rounded-full flex items-center justify-center mx-auto mb-6 shadow-md">
                    <svg class="w-8 h-8 text-[#4e5e72]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09z"/>
                    </svg>
                </div>
                <p class="text-[#4e5e72] font-semibold text-xl md:text-2xl leading-relaxed">
                    Mientras otros fotógrafos te mandan un USB o un link de WeTransfer que caduca a los pocos días, 
                    aquí tus fotos tienen su propio espacio en la web, siempre accesibles, siempre tuyas. 
                </p>
                <div class="mt-6 inline-block bg-[#4e5e72] text-white px-6 py-2 rounded-full text-sm font-bold uppercase tracking-wider shadow-sm">
                    Eso no lo hace todo el mundo
                </div>
            </div>
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('contacto') }}" class="inline-flex items-center gap-3 px-10 py-4 bg-[#FC9B67] text-white font-bold rounded-full hover:bg-[#e88950] transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-0.5 text-lg group">
                Quiero mi galería
                <svg class="w-5 h-5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </div>

    <script>
        (function(){
            var cards = document.querySelectorAll('#workflow-section .pr-card');
            var lineFill = document.getElementById('pr-line-fill');
            var ticking = false;

            function isVisible(el) {
                var rect = el.getBoundingClientRect();
                var vh = window.innerHeight;
                return rect.top < vh * 0.85 && rect.bottom > 0;
            }

            function animate() {
                cards.forEach(function(c) {
                    if (!c.classList.contains('show') && isVisible(c)) {
                        c.classList.add('show');
                    }
                });
                if (lineFill) {
                    var shown = document.querySelectorAll('#workflow-section .pr-card.show');
                    if (shown.length > 0) {
                        var first = shown[0];
                        var last = shown[shown.length - 1];
                        var cf = first.closest('.max-w-4xl') || lineFill.parentElement;
                        var cfRect = cf.getBoundingClientRect();
                        var fRect = first.getBoundingClientRect();
                        var lRect = last.getBoundingClientRect();
                        var startY = fRect.top - cfRect.top + fRect.height / 2;
                        var endY = lRect.top - cfRect.top + lRect.height / 2;
                        var targetH = endY - startY;
                        var progress = Math.min((window.innerHeight * 0.7 - fRect.top) / (targetH || 1), 1);
                        lineFill.style.height = Math.max(0, startY + targetH * Math.max(progress, 0)) + 'px';
                        lineFill.style.top = startY + 'px';
                    }
                }
                ticking = false;
            }

            function onScroll() {
                if (!ticking) { ticking = true; requestAnimationFrame(animate); }
            }

            window.addEventListener('scroll', onScroll, { passive: true });
            window.addEventListener('resize', onScroll, { passive: true });
            animate();

            if ('IntersectionObserver' in window) {
                var obs = new IntersectionObserver(function(entries) {
                    entries.forEach(function(e) {
                        if (e.isIntersecting) { animate(); }
                    });
                }, { threshold: 0.1 });
                cards.forEach(function(c) { obs.observe(c); });
            }
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
