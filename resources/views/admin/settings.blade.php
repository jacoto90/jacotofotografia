@extends('layouts.admin')

@section('title', 'Configuración')

@section('content')
<div class="max-w-3xl">
    <flux:heading size="xl" class="mb-6">Configuración</flux:heading>

    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-sm">{{ session('success') }}</div>
    @endif

    <div class="bg-white p-6 rounded-lg shadow-sm mb-6">
        <h3 class="font-semibold mb-4">Notificaciones</h3>
        <form method="POST" action="{{ route('admin.settings.update') }}" class="space-y-4">
            @csrf @method('PUT')

            @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded text-sm space-y-1">
                @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
                @endforeach
            </div>
            @endif

            <flux:field>
                <flux:label>Email de notificación</flux:label>
                <flux:input name="notify_email" type="email" value="{{ old('notify_email', App\Models\Setting::get('notify_email')) }}" placeholder="admin@ejemplo.com" />
                <flux:description>Se enviará un aviso aquí cuando alguien inicie sesión como admin</flux:description>
            </flux:field>

            <hr class="my-6">

            <h3 class="font-semibold mb-4">Servidor SMTP</h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <flux:field>
                    <flux:label>Host</flux:label>
                    <flux:input name="mail_host" value="{{ old('mail_host', App\Models\Setting::get('mail_host', 'smtp.gmail.com')) }}" />
                </flux:field>
                <flux:field>
                    <flux:label>Puerto</flux:label>
                    <flux:input name="mail_port" value="{{ old('mail_port', App\Models\Setting::get('mail_port', '587')) }}" />
                </flux:field>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <flux:field>
                    <flux:label>Usuario</flux:label>
                    <flux:input name="mail_username" value="{{ old('mail_username', App\Models\Setting::get('mail_username')) }}" placeholder="tu@gmail.com" />
                </flux:field>
                <flux:field>
                    <flux:label>Contraseña</flux:label>
                    <flux:input name="mail_password" type="password" value="{{ old('mail_password', App\Models\Setting::get('mail_password')) }}" placeholder="Contraseña de aplicación" />
                </flux:field>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <flux:field>
                    <flux:label>Encriptación</flux:label>
                    <flux:select name="mail_encryption">
                        @php $enc = App\Models\Setting::get('mail_encryption', 'tls'); @endphp
                        <option value="tls" {{ $enc == 'tls' ? 'selected' : '' }}>TLS</option>
                        <option value="ssl" {{ $enc == 'ssl' ? 'selected' : '' }}>SSL</option>
                        <option value="" {{ $enc == '' ? 'selected' : '' }}>Ninguna</option>
                    </flux:select>
                </flux:field>
                <flux:field>
                    <flux:label>Email remitente</flux:label>
                    <flux:input name="mail_from_address" type="email" value="{{ old('mail_from_address', App\Models\Setting::get('mail_from_address')) }}" placeholder="tu@gmail.com" />
                </flux:field>
            </div>

            <div class="pt-4">
                <flux:button type="submit" variant="primary">Guardar configuración</flux:button>
            </div>
        </form>
    </div>
</div>
@endsection
