@extends('layouts.admin')

@section('title', 'Nuevo Book')

@section('content')
<div class="max-w-2xl">
    <flux:heading size="xl" class="mb-6">Nuevo Book de Fotos</flux:heading>

    <div class="bg-white p-6 rounded-lg shadow-sm">
        <form method="POST" action="{{ route('admin.books.store') }}" class="space-y-4">
            @csrf

            @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded text-sm space-y-1">
                @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
                @endforeach
            </div>
            @endif

            <div>
                <flux:field>
                    <flux:label>Nombre del Book</flux:label>
                    <flux:input name="nombrebook" value="{{ old('nombrebook') }}" placeholder="Ej: Boda - Sandra y Dario" />
                    <flux:error name="nombrebook" />
                </flux:field>
            </div>

            <div>
                <flux:field>
                    <flux:label>Cliente</flux:label>
                    <flux:select name="idcliente">
                        <option value="">Seleccionar cliente...</option>
                        @foreach($clientes as $c)
                        <option value="{{ $c->idcliente }}" {{ old('idcliente') == $c->idcliente ? 'selected' : '' }}>
                            {{ $c->nombre }} {{ $c->apellido }}
                        </option>
                        @endforeach
                    </flux:select>
                    <flux:error name="idcliente" />
                </flux:field>
            </div>

            <div>
                <flux:field>
                    <flux:label>Contraseña de acceso</flux:label>
                    <flux:input name="pwd" value="{{ old('pwd') }}" type="text" placeholder="Ej: @boda" />
                    <flux:error name="pwd" />
                </flux:field>
            </div>

            <div class="flex gap-2 pt-2">
                <flux:button type="submit" variant="primary">Guardar Book</flux:button>
                <flux:button as="a" href="{{ route('admin.books.index') }}" variant="ghost">Cancelar</flux:button>
            </div>
        </form>
    </div>
</div>
@endsection
