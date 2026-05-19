@extends('layouts.admin')

@section('title', 'Editar Cliente')

@section('content')
<div class="max-w-2xl">
    <flux:heading size="xl" class="mb-6">Editar Cliente</flux:heading>

    <div class="bg-white p-6 rounded-lg shadow-sm">
        <form method="POST" action="{{ route('admin.clientes.update', $cliente->idcliente) }}" class="space-y-4">
            @csrf @method('PUT')

            @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded text-sm space-y-1">
                @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
                @endforeach
            </div>
            @endif

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <flux:field>
                    <flux:label>Nombre</flux:label>
                    <flux:input name="nombre" value="{{ old('nombre', $cliente->nombre) }}" />
                    <flux:error name="nombre" />
                </flux:field>
                <flux:field>
                    <flux:label>Apellidos</flux:label>
                    <flux:input name="apellido" value="{{ old('apellido', $cliente->apellido) }}" />
                    <flux:error name="apellido" />
                </flux:field>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <flux:field>
                    <flux:label>Teléfono</flux:label>
                    <flux:input name="telefono" value="{{ old('telefono', $cliente->telefono) }}" />
                    <flux:error name="telefono" />
                </flux:field>
                <flux:field>
                    <flux:label>Email</flux:label>
                    <flux:input type="email" name="email" value="{{ old('email', $cliente->email) }}" />
                    <flux:error name="email" />
                </flux:field>
            </div>

            <div class="flex gap-2 pt-2">
                <flux:button type="submit" variant="primary">Actualizar Cliente</flux:button>
                <flux:button as="a" href="{{ route('admin.clientes.index') }}" variant="ghost">Cancelar</flux:button>
            </div>
        </form>
    </div>
</div>
@endsection
