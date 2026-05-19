@extends('layouts.admin')

@section('title', 'Editar Book')

@section('content')
<div class="max-w-2xl">
    <flux:heading size="xl" class="mb-6">Editar Book</flux:heading>

    <div class="bg-white p-6 rounded-lg shadow-sm">
        <form method="POST" action="{{ route('admin.books.update', $book->idbookfotos) }}" class="space-y-4">
            @csrf @method('PUT')

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
                    <flux:input name="nombrebook" value="{{ old('nombrebook', $book->nombrebook) }}" />
                    <flux:error name="nombrebook" />
                </flux:field>
            </div>

            <div>
                <flux:field>
                    <flux:label>Cliente</flux:label>
                    <flux:select name="idcliente">
                        <option value="">Seleccionar cliente...</option>
                        @foreach($clientes as $c)
                        <option value="{{ $c->idcliente }}" {{ ($book->idcliente == $c->idcliente) ? 'selected' : '' }}>
                            {{ $c->nombre }} {{ $c->apellido }}
                        </option>
                        @endforeach
                    </flux:select>
                    <flux:error name="idcliente" />
                </flux:field>
            </div>

            <div>
                <flux:field>
                    <flux:label>Nueva contraseña</flux:label>
                    <flux:input name="pwd" type="text" placeholder="Dejar vacío para mantener la actual" />
                    <flux:error name="pwd" />
                    <flux:description>Deja vacío si no quieres cambiarla</flux:description>
                </flux:field>
            </div>

            <div class="flex gap-2 pt-2">
                <flux:button type="submit" variant="primary">Actualizar Book</flux:button>
                <flux:button as="a" href="{{ route('admin.books.index') }}" variant="ghost">Cancelar</flux:button>
            </div>
        </form>
    </div>
</div>
@endsection
