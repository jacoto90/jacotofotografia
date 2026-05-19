@extends('layouts.app')

@section('title', 'Contacto')
@section('description', 'Contacta con Jacoto Fotografía para presupuestos, sesiones de fotos y más.')

@section('content')
<style>
    .contact-wrapper {
        max-width: 35rem; margin: 60px auto; background-color: white;
        padding: 2rem; box-shadow: 0 4px 8px rgba(0,0,0,0.1); border-radius: 8px;
    }
    .contact-wrapper input, .contact-wrapper textarea {
        width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;
    }
    .contact-wrapper button {
        width: 100%; padding: 10px; background-color: #4e5e72; color: white;
        border: none; border-radius: 4px; cursor: pointer; transition: background-color 0.2s;
    }
    .contact-wrapper button:hover { background-color: #3d4a5a; }
</style>

<div class="contact-wrapper">
    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-sm">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('contacto.enviar') }}" method="POST">
        @csrf
        <h1 class="text-2xl text-center mb-6 font-['Dancing_Script']">Contacto</h1>

        <div class="mb-4">
            <input type="text" name="name" placeholder="Escriba su nombre..." value="{{ old('name') }}" required>
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <input type="text" name="cname" placeholder="Escriba sus apellidos..." value="{{ old('cname') }}" required>
            @error('cname') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <input type="text" name="mobil" placeholder="Escriba su n&uacute;mero de m&oacute;vil..." value="{{ old('mobil') }}" required maxlength="9">
            @error('mobil') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <input type="email" name="email" placeholder="Escriba su e-mail..." value="{{ old('email') }}" required>
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <textarea name="mensaje" placeholder="Escriba aqu&iacute; su mensaje..." rows="5" required>{{ old('mensaje') }}</textarea>
            @error('mensaje') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div style="display:none">
            <input type="text" name="localidad" tabindex="-1" autocomplete="off">
        </div>

        <div class="mb-4">
            <label class="flex items-center gap-2">
                <input type="checkbox" name="politica" required>
                <span class="text-sm">Acepto la pol&iacute;tica de Protecci&oacute;n de datos</span>
            </label>
        </div>

        <button type="submit">Enviar Mensaje</button>
    </form>
</div>
@endsection
