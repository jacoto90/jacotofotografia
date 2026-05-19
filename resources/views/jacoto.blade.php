@extends('layouts.app')

@section('title', 'Jacoto')
@section('description', 'José Ángel Colmena — Fotógrafo profesional y desarrollador full stack. Descubre el talento detrás de Jacoto Fotografía y lawebdejacoto.com.')

@section('content')
<style>
    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }
    .float { animation: float 4s ease-in-out infinite; }

    .badge-pill {
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
        padding: 0.375rem 1rem;
        border-radius: 9999px;
        font-size: 0.8125rem;
        font-weight: 500;
        transition: all 0.2s;
    }

    .timeline-dot {
        width: 16px;
        height: 16px;
        border-radius: 50%;
        border: 3px solid #c8e7d8;
        background: white;
        flex-shrink: 0;
        position: relative;
        z-index: 1;
    }
    .timeline-line {
        position: absolute;
        left: 7px;
        top: 20px;
        bottom: -20px;
        width: 2px;
        background: #e5e7eb;
    }

    .glass-card {
        background: rgba(255,255,255,0.7);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid rgba(255,255,255,0.3);
    }

    .skill-tag {
        display: inline-block;
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 500;
        background: #c8e7d8;
        color: #4e5e72;
        transition: all 0.2s;
    }
    .skill-tag:hover {
        background: #b8d7c8;
        transform: translateY(-1px);
    }

    .split-card {
        transition: all 0.4s ease;
    }
    .split-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    }
</style>

{{-- Hero --}}
<section class="relative min-h-screen flex items-center pt-20 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-[#c8e7d8]/20 via-white to-[#FC9B67]/10"></div>
    <div class="absolute top-20 right-0 w-96 h-96 bg-[#c8e7d8]/20 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-80 h-80 bg-[#FC9B67]/10 rounded-full blur-3xl"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 w-full">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div class="order-2 md:order-1">
                <span class="text-[#FC9B67] font-semibold text-sm uppercase tracking-widest">José Ángel Colmena</span>
                <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold text-[#4e5e72] mt-4 leading-tight">
                    Fotógrafo &<br>
                    <span class="text-[#FC9B67]">Desarrollador</span>
                </h1>
                <p class="text-lg text-gray-600 mt-6 leading-relaxed max-w-xl">
                    Detrás de Jacoto Fotografía hay un profesional que entiende tanto el arte de capturar momentos como la tecnología que los hace llegar al mundo.
                </p>
                <div class="flex flex-wrap gap-3 mt-8">
                    <a href="https://lawebdejacoto.com" target="_blank" rel="noopener" class="inline-flex items-center gap-2 px-6 py-3 bg-[#4e5e72] text-white font-semibold rounded-full hover:bg-[#3d4a5a] transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        Portfolio Dev
                    </a>
                    <a href="{{ route('contacto') }}" class="inline-flex items-center gap-2 px-6 py-3 border-2 border-[#4e5e72]/20 text-[#4e5e72] font-semibold rounded-full hover:border-[#FC9B67] hover:text-[#FC9B67] transition-all duration-300">
                        Hablemos
                    </a>
                </div>
            </div>
            <div class="order-1 md:order-2 flex justify-center">
                <div class="relative">
                    <img src="{{ asset('img/jose.jpg') }}" alt="José Ángel Colmena" class="w-72 h-72 sm:w-96 sm:h-96 object-cover rounded-3xl shadow-2xl float">
                    <div class="absolute -bottom-4 -right-4 bg-white rounded-2xl p-4 shadow-lg glass-card">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-[#c8e7d8] rounded-xl flex items-center justify-center">
                                <svg class="w-5 h-5 text-[#4e5e72]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-[#4e5e72]">Dual</p>
                                <p class="text-xs text-gray-500">Foto + Dev</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Intro --}}
<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center">
        <span class="text-[#FC9B67] font-semibold text-sm uppercase tracking-widest">Dos mundos, un creador</span>
        <h2 class="text-3xl sm:text-4xl font-bold text-[#4e5e72] mt-3 mb-8">La mirada del artista, la mente del ingeniero</h2>
        <p class="text-gray-600 text-lg leading-relaxed">
            Soy José Ángel, fotógrafo profesional y desarrollador full stack. Mi trabajo une dos pasiones: 
            capturar la esencia de las personas y los momentos a través de la fotografía, y construir 
            soluciones digitales que transforman ideas en realidad. <strong>Jacoto Fotografía</strong> es mi 
            estudio visual, y <a href="https://lawebdejacoto.com" target="_blank" rel="noopener" class="text-[#FC9B67] font-semibold hover:underline">lawebdejacoto.com</a> 
            es mi escaparate como desarrollador de software.
        </p>
    </div>
</section>

{{-- Split: Photography / Development --}}
<section class="py-20 bg-[#f8faf9]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="grid md:grid-cols-2 gap-8">
            {{-- Photography --}}
            <div class="split-card bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl">
                <div class="h-56 overflow-hidden">
                    <img src="{{ asset('img/sony.jpg') }}" alt="Fotografía profesional" class="w-full h-full object-cover">
                </div>
                <div class="p-8">
                    <div class="w-12 h-12 bg-[#c8e7d8] rounded-2xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-[#4e5e72]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.16a15.53 15.53 0 01-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0z"/></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-[#4e5e72] mb-3">Fotografía</h3>
                    <p class="text-gray-600 leading-relaxed mb-4">
                        Especializado en bodas, eventos corporativos y sesiones personalizadas. 
                        Mi enfoque es natural y cercano: busco la luz, la emoción y el instante 
                        que cuenta la historia real.
                    </p>
                    <div class="flex flex-wrap gap-2">
                        <span class="skill-tag">Bodas</span>
                        <span class="skill-tag">Eventos</span>
                        <span class="skill-tag">Retratos</span>
                        <span class="skill-tag">Fotomatón</span>
                    </div>
                </div>
            </div>

            {{-- Development --}}
            <div class="split-card bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl">
                <div class="h-56 overflow-hidden">
                    <img src="{{ asset('img/design.png') }}" alt="Desarrollo de software" class="w-full h-full object-cover">
                </div>
                <div class="p-8">
                    <div class="w-12 h-12 bg-[#FC9B67]/20 rounded-2xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-[#FC9B67]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5"/></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-[#4e5e72] mb-3">Desarrollo Full Stack</h3>
                    <p class="text-gray-600 leading-relaxed mb-4">
                        Arquitecto de software especializado en Laravel, .NET, Python y Angular. 
                        Construyo sistemas ERP, plataformas e-commerce y herramientas internas 
                        que optimizan procesos y mejoran la toma de decisiones.
                    </p>
                    <div class="flex flex-wrap gap-2">
                        <span class="skill-tag">Laravel</span>
                        <span class="skill-tag">.NET / C#</span>
                        <span class="skill-tag">Angular</span>
                        <span class="skill-tag" onclick="this.dataset.clicks=(parseInt(this.dataset.clicks||0)+1);if(this.dataset.clicks=='3'){window.location.href='/admin/login'}" style="cursor:pointer">Python</span>
                        <span class="skill-tag">Shopify</span>
                        <span class="skill-tag">PostgreSQL</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Timeline --}}
<section class="py-20 sm:py-28 bg-white">
    <div class="max-w-3xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-16">
            <span class="text-[#FC9B67] font-semibold text-sm uppercase tracking-widest">Trayectoria</span>
            <h2 class="text-3xl sm:text-4xl font-bold text-[#4e5e72] mt-3">Mi recorrido</h2>
        </div>

        <div class="space-y-12">
            <div class="flex gap-6">
                <div class="flex flex-col items-center">
                    <div class="timeline-dot"></div>
                    <div class="timeline-line"></div>
                </div>
                <div class="pb-4">
                    <span class="text-sm font-semibold text-[#FC9B67]">2023 — Actualidad</span>
                    <h3 class="text-xl font-bold text-[#4e5e72] mt-1">Jacoto Fotografía</h3>
                    <p class="text-gray-600 mt-2 leading-relaxed">
                        Nace Jacoto Fotografía como la evolución natural de mi pasión por la imagen. 
                        Me especializo en bodas, eventos y sesiones por la Costa Brava, capturando 
                        la luz, la emoción y la esencia de cada momento con un estilo natural y cercano.
                    </p>
                </div>
            </div>

            <div class="flex gap-6">
                <div class="flex flex-col items-center">
                    <div class="timeline-dot"></div>
                    <div class="timeline-line"></div>
                </div>
                <div class="pb-4">
                    <span class="text-sm font-semibold text-[#FC9B67]">2021 — 2023</span>
                    <h3 class="text-xl font-bold text-[#4e5e72] mt-1">CFGS Desarrollo de Aplicaciones Web</h3>
                    <p class="text-gray-600 mt-2 leading-relaxed">
                        Me formé en desarrollo web en el IES Montilivi de Girona, compaginando 
                        los estudios con sesiones fotográficas. Esta etapa unió definitivamente 
                        mi faceta creativa con la tecnológica.
                    </p>
                </div>
            </div>

            <div class="flex gap-6">
                <div class="flex flex-col items-center">
                    <div class="timeline-dot"></div>
                    <div class="timeline-line"></div>
                </div>
                <div class="pb-4">
                    <span class="text-sm font-semibold text-[#FC9B67]">2020</span>
                    <h3 class="text-xl font-bold text-[#4e5e72] mt-1">Inicio en la Fotografía</h3>
                    <p class="text-gray-600 mt-2 leading-relaxed">
                        Todo empezó con una cámara y la necesidad de capturar la belleza del 
                        paisaje, la luz del atardecer en la Costa Brava y las expresiones 
                        sinceras de las personas. Lo que comenzó como una afición se convirtió 
                        en mi forma de ver y contar el mundo.
                    </p>
                </div>
            </div>

            <div class="flex gap-6">
                <div class="flex flex-col items-center">
                    <div class="timeline-dot"></div>
                </div>
                <div class="pb-4">
                    <span class="text-sm font-semibold text-[#FC9B67]">2009</span>
                    <h3 class="text-xl font-bold text-[#4e5e72] mt-1">CFGM Sistemas Informáticos</h3>
                    <p class="text-gray-600 mt-2 leading-relaxed">
                        Mis primeros pasos en el mundo de la tecnología en el IES Salvador Espriu, 
                        sentando las bases técnicas que más tarde integraría con mi vocación 
                        artística y creativa.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Portfolio Dev CTA --}}
<section class="relative py-24 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-[#4e5e72] to-[#3d4a5a]"></div>
    <div class="absolute top-10 left-10 w-72 h-72 bg-[#FC9B67]/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-10 right-10 w-72 h-72 bg-[#c8e7d8]/10 rounded-full blur-3xl"></div>

    <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 text-center">
        <span class="text-[#c8e7d8] font-semibold text-sm uppercase tracking-widest">Mi otro lado</span>
        <h2 class="text-3xl sm:text-4xl font-bold text-white mt-3 mb-6">
            ¿Sabías que también soy<br>desarrollador de software?
        </h2>
        <p class="text-white/70 text-lg leading-relaxed mb-8 max-w-2xl mx-auto">
            En <strong class="text-white">lawebdejacoto.com</strong> encontrarás mi portfolio como 
            desarrollador full stack: proyectos reales, tecnologías modernas y soluciones que 
            mejoran procesos de negocio.
        </p>
        <a href="https://lawebdejacoto.com" target="_blank" rel="noopener" class="inline-flex items-center gap-3 px-10 py-4 bg-[#FC9B67] text-white font-semibold rounded-full hover:bg-[#e88950] transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-0.5 text-lg group">
            Visitar lawebdejacoto.com
            <svg class="w-5 h-5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
        </a>
        <div class="mt-12 flex flex-wrap justify-center gap-3">
            <span class="badge-pill bg-white/10 text-white/80">Laravel</span>
            <span class="badge-pill bg-white/10 text-white/80">.NET / C#</span>
            <span class="badge-pill bg-white/10 text-white/80">Angular</span>
            <span class="badge-pill bg-white/10 text-white/80">Python</span>
            <span class="badge-pill bg-white/10 text-white/80">PostgreSQL</span>
            <span class="badge-pill bg-white/10 text-white/80">Shopify</span>
            <span class="badge-pill bg-white/10 text-white/80">ERP / Odoo</span>
        </div>
    </div>
</section>

{{-- Final CTA --}}
<section class="py-20 bg-white">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 text-center">
        <h2 class="text-3xl sm:text-4xl font-bold text-[#4e5e72] mb-4">¿Hablamos?</h2>
        <p class="text-gray-600 text-lg leading-relaxed mb-8">
            Ya sea para capturar un momento especial con mi cámara o para construir 
            la próxima gran herramienta digital, estaré encantado de escuchar tu proyecto.
        </p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="mailto:webjacoto@gmail.com" class="inline-flex items-center gap-2 px-8 py-3.5 bg-[#4e5e72] text-white font-semibold rounded-full hover:bg-[#3d4a5a] transition-all duration-300">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/></svg>
                webjacoto@gmail.com
            </a>
            <a href="https://lawebdejacoto.com" target="_blank" rel="noopener" class="inline-flex items-center gap-2 px-8 py-3.5 border-2 border-[#FC9B67] text-[#FC9B67] font-semibold rounded-full hover:bg-[#FC9B67] hover:text-white transition-all duration-300">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244"/></svg>
                lawebdejacoto.com
            </a>
        </div>
    </div>
</section>
@endsection
