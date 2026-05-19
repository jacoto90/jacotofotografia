@extends('layouts.app')

@section('title', 'Política de Cookies')
@section('description', 'Política de cookies de Jacoto Fotografía.')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-12 mt-16">
    <h1 class="text-3xl font-bold text-[#4e5e72] mb-8 text-center">Política de Cookies</h1>

    <div class="bg-white rounded-lg shadow-md p-8 text-sm text-gray-700 leading-relaxed space-y-6">
        <section>
            <h2 class="text-lg font-semibold text-[#4e5e72] mb-2">¿Qué son las cookies?</h2>
            <p>Las cookies son pequeños archivos de texto que se almacenan en tu navegador cuando visitas un sitio web. Permiten recordar tus preferencias y mejorar tu experiencia de navegación.</p>
        </section>

        <section>
            <h2 class="text-lg font-semibold text-[#4e5e72] mb-2">Cookies utilizadas en este sitio</h2>
            <p>En Jacoto Fotografía utilizamos únicamente las siguientes cookies:</p>

            <div class="overflow-x-auto mt-3">
                <table class="w-full text-xs border-collapse">
                    <thead>
                        <tr class="bg-[#c8e7d8]">
                            <th class="p-2 text-left">Cookie</th>
                            <th class="p-2 text-left">Tipo</th>
                            <th class="p-2 text-left">Finalidad</th>
                            <th class="p-2 text-left">Duración</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr>
                            <td class="p-2 font-mono">laravel_session</td>
                            <td class="p-2">Técnica (esencial)</td>
                            <td class="p-2">Mantiene la sesión del usuario y el token CSRF para seguridad del formulario</td>
                            <td class="p-2">Sesión</td>
                        </tr>
                        <tr>
                            <td class="p-2 font-mono">XSRF-TOKEN</td>
                            <td class="p-2">Técnica (esencial)</td>
                            <td class="p-2">Protección contra falsificación de peticiones cruzadas (CSRF)</td>
                            <td class="p-2">Sesión</td>
                        </tr>
                        <tr>
                            <td class="p-2 font-mono">_ga</td>
                            <td class="p-2">Analítica (no esencial)</td>
                            <td class="p-2">Google Analytics — estadísticas anónimas de visitas</td>
                            <td class="p-2">2 años</td>
                        </tr>
                        <tr>
                            <td class="p-2 font-mono">_ga_WBJVVB9MRB</td>
                            <td class="p-2">Analítica (no esencial)</td>
                            <td class="p-2">Google Analytics — identificación de sesión</td>
                            <td class="p-2">2 años</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <section>
            <h2 class="text-lg font-semibold text-[#4e5e72] mb-2">Cookies técnicas (esenciales)</h2>
            <p>Las cookies <strong>laravel_session</strong> y <strong>XSRF-TOKEN</strong> son necesarias para el funcionamiento básico del sitio web y la seguridad de los formularios. No requieren consentimiento del usuario.</p>
        </section>

        <section>
            <h2 class="text-lg font-semibold text-[#4e5e72] mb-2">Cookies de terceros (Google Analytics)</h2>
            <p>Utilizamos <strong>Google Analytics</strong> (Google LLC) para obtener estadísticas anónimas sobre las visitas: páginas más vistas, tiempo de navegación, origen del tráfico, etc. Estos datos nos ayudan a mejorar el sitio.</p>
            <p>Google Analytics almacena cookies en tu navegador y puede transferir datos a servidores en Estados Unidos. Google está adherido al marco <strong>Data Privacy Framework (DPF)</strong> UE-EE.UU.</p>
            <p class="mt-1">Puedes consultar la política de cookies de Google en: <a href="https://policies.google.com/privacy" target="_blank" rel="noopener" class="text-blue-600 hover:underline">https://policies.google.com/privacy</a></p>
            <p class="mt-2">Estas cookies <strong>solo se activan si das tu consentimiento</strong> a través del aviso de cookies.</p>
        </section>

        <section>
            <h2 class="text-lg font-semibold text-[#4e5e72] mb-2">Gestión del consentimiento</h2>
            <p>Al hacer clic en <strong>"Aceptar"</strong> en el aviso de cookies, consientes el uso de Google Analytics. Puedes retirar tu consentimiento en cualquier momento eliminando las cookies desde la configuración de tu navegador.</p>
        </section>

        <section>
            <h2 class="text-lg font-semibold text-[#4e5e72] mb-2">Cómo desactivar las cookies</h2>
            <p>Puedes configurar tu navegador para bloquear o eliminar cookies desde los ajustes de privacidad:</p>
            <ul class="list-disc pl-6 mt-2 space-y-1">
                <li><a href="https://support.google.com/chrome/answer/95647" target="_blank" rel="noopener" class="text-blue-600 hover:underline">Google Chrome</a></li>
                <li><a href="https://support.mozilla.org/es/kb/habilitar-y-deshabilitar-cookies-sitios-web-rastrear-preferencias" target="_blank" rel="noopener" class="text-blue-600 hover:underline">Mozilla Firefox</a></li>
                <li><a href="https://support.apple.com/es-es/guide/safari/sfri11471/mac" target="_blank" rel="noopener" class="text-blue-600 hover:underline">Safari</a></li>
                <li><a href="https://support.microsoft.com/es-es/microsoft-edge/eliminar-cookies-en-microsoft-edge-63947406-40ac-c3b8-57b9-2a946a29ae09" target="_blank" rel="noopener" class="text-blue-600 hover:underline">Microsoft Edge</a></li>
            </ul>
        </section>

        <section>
            <h2 class="text-lg font-semibold text-[#4e5e72] mb-2">Actualización</h2>
            <p>Esta política fue actualizada por última vez en <strong>mayo de 2026</strong>.</p>
        </section>

        <div class="border-t pt-4 text-center text-xs text-gray-400">
            <p>Jacoto Fotografía &copy; {{ date('Y') }} &middot; José Ángel Colmena Tomás</p>
        </div>
    </div>
</div>
@endsection
