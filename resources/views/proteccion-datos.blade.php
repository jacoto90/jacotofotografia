@extends('layouts.app')

@section('title', 'Protección de Datos')
@section('description', 'Política de protección de datos y privacidad de Jacoto Fotografía.')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-12 mt-16">
    <h1 class="text-3xl font-bold text-[#4e5e72] mb-8 text-center">Política de Protección de Datos</h1>

    <div class="bg-white rounded-lg shadow-md p-8 text-sm text-gray-700 leading-relaxed space-y-6">
        <p class="font-semibold text-base">JACOTO FOTOGRAFÍA – JOSÉ ÁNGEL COLMENA TOMÁS</p>

        <section>
            <h2 class="text-lg font-semibold text-[#4e5e72] mb-2">1. Responsable del tratamiento</h2>
            <p>El responsable del tratamiento de tus datos personales es <strong>José Ángel Colmena Tomás</strong>, con domicilio en Girona, actuando bajo el nombre comercial de Jacoto Fotografía.</p>
            <p>Correo de contacto: <a href="mailto:webjacoto@gmail.com" class="text-blue-600 hover:underline">webjacoto@gmail.com</a></p>
        </section>

        <section>
            <h2 class="text-lg font-semibold text-[#4e5e72] mb-2">2. Finalidad del tratamiento</h2>
            <p>Los datos personales que nos facilites a través del formulario de contacto (<strong>nombre, apellidos, correo electrónico, teléfono y mensaje</strong>) serán utilizados exclusivamente para:</p>
            <ul class="list-disc pl-6 mt-2 space-y-1">
                <li>Responder a tu consulta, solicitud de presupuesto o información.</li>
                <li>Gestionar la comunicación contigo en relación con los servicios fotográficos solicitados.</li>
            </ul>
            <p class="mt-2">En ningún caso utilizaremos tus datos para enviarte comunicaciones publicitarias no solicitadas.</p>
        </section>

        <section>
            <h2 class="text-lg font-semibold text-[#4e5e72] mb-2">3. Legitimación</h2>
            <p>La base legal para el tratamiento de tus datos es el <strong>consentimiento explícito</strong> que nos otorgas al marcar la casilla de aceptación de esta política y enviar el formulario.</p>
        </section>

        <section>
            <h2 class="text-lg font-semibold text-[#4e5e72] mb-2">4. Destinatarios de los datos</h2>
            <p><strong>Tus datos no serán cedidos, compartidos ni vendidos a terceros</strong>, salvo obligación legal.</p>
            <p>Los datos se almacenan en servidores de Hostalia (Hostalia Internet S.L.U.), nuestro proveedor de hosting, que cumple con la normativa europea de protección de datos.</p>
        </section>

        <section>
            <h2 class="text-lg font-semibold text-[#4e5e72] mb-2">5. Plazo de conservación</h2>
            <p>Conservaremos tus datos durante el tiempo necesario para atender tu consulta y, posteriormente, durante el plazo legal de prescripción de responsabilibilidades (máximo 5 años).</p>
        </section>

        <section>
            <h2 class="text-lg font-semibold text-[#4e5e72] mb-2">6. Derechos</h2>
            <p>Tienes derecho a:</p>
            <ul class="list-disc pl-6 mt-2 space-y-1">
                <li><strong>Acceder</strong> a tus datos personales.</li>
                <li><strong>Rectificar</strong> datos inexactos.</li>
                <li><strong>Solicitar la supresión</strong> de tus datos.</li>
                <li><strong>Limitar u oponerte</strong> al tratamiento.</li>
                <li><strong>Solicitar la portabilidad</strong> de tus datos.</li>
            </ul>
            <p class="mt-2">Para ejercer estos derechos, escríbenos a <a href="mailto:webjacoto@gmail.com" class="text-blue-600 hover:underline">webjacoto@gmail.com</a>.</p>
            <p>También tienes derecho a presentar una reclamación ante la <strong>Agencia Española de Protección de Datos (AEPD)</strong>.</p>
        </section>

        <section>
            <h2 class="text-lg font-semibold text-[#4e5e72] mb-2">7. Medidas de seguridad</h2>
            <p>Adoptamos las medidas técnicas y organizativas necesarias para garantizar la seguridad e integridad de tus datos personales, evitando su alteración, pérdida o acceso no autorizado.</p>
        </section>

        <section>
            <h2 class="text-lg font-semibold text-[#4e5e72] mb-2">8. Actualización</h2>
            <p>Esta política fue actualizada por última vez en <strong>mayo de 2026</strong>. Cualquier cambio será reflejado en esta misma página.</p>
        </section>

        <div class="border-t pt-4 text-center text-xs text-gray-400 space-y-1">
            <p>Jacoto Fotografía &copy; {{ date('Y') }} &middot; José Ángel Colmena Tomás</p>
            <p><a href="{{ route('politica.cookies') }}" class="text-blue-600 hover:underline">Política de Cookies</a></p>
        </div>
    </div>
</div>
@endsection
