@extends('layouts.admin')

@section('title', 'Clientes')

@section('content')
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
    <flux:heading size="xl">Clientes</flux:heading>
    <flux:button as="a" href="{{ route('admin.clientes.create') }}" variant="primary">+ Nuevo Cliente</flux:button>
</div>

<div class="hidden md:block bg-white rounded-lg shadow-sm overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-[#c8e7d8]">
            <tr>
                <th class="text-left p-3">ID</th>
                <th class="text-left p-3">Nombre</th>
                <th class="text-left p-3">Apellidos</th>
                <th class="text-left p-3">Tel&eacute;fono</th>
                <th class="text-left p-3">Email</th>
                <th class="text-left p-3">Books</th>
                <th class="text-left p-3">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($clientes as $c)
            <tr class="border-t border-gray-100 hover:bg-gray-50">
                <td class="p-3">{{ $c->idcliente }}</td>
                <td class="p-3 font-medium">{{ $c->nombre }}</td>
                <td class="p-3">{{ $c->apellido }}</td>
                <td class="p-3">{{ $c->telefono }}</td>
                <td class="p-3">
                    <a href="mailto:{{ $c->email }}" class="text-blue-600 hover:underline">{{ $c->email }}</a>
                </td>
                <td class="p-3">{{ $c->bookfotos_count }}</td>
                <td class="p-3">
                    <div class="flex items-center gap-1">
                        <flux:button as="a" href="{{ route('admin.clientes.edit', $c->idcliente) }}" size="sm" variant="ghost" icon-trailing="pencil">Editar</flux:button>
                        <form action="{{ route('admin.clientes.destroy', $c->idcliente) }}" method="POST" class="inline" onsubmit="return confirm('¿Eliminar cliente?')">
                            @csrf @method('DELETE')
                            <flux:button type="submit" size="sm" variant="ghost" icon-trailing="trash" class="text-red-600 hover:text-red-800">Eliminar</flux:button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="7" class="p-6 text-center text-gray-500">No hay clientes.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="md:hidden space-y-4">
    @forelse($clientes as $c)
    <div class="bg-white rounded-lg shadow-sm p-4">
        <div class="flex justify-between">
            <div>
                <h3 class="font-semibold">{{ $c->nombre }} {{ $c->apellido }}</h3>
                <a href="mailto:{{ $c->email }}" class="text-xs text-blue-600 hover:underline block">{{ $c->email }}</a>
            </div>
            <span class="text-xs text-gray-400">#{{ $c->idcliente }}</span>
        </div>
        <div class="flex items-center gap-4 mt-2 text-xs text-gray-500">
            <span>Tel: {{ $c->telefono }}</span>
            <span>{{ $c->bookfotos_count }} book(s)</span>
        </div>
        <div class="flex gap-2 mt-3">
            <flux:button as="a" href="{{ route('admin.clientes.edit', $c->idcliente) }}" size="sm" variant="ghost">Editar</flux:button>
            <form action="{{ route('admin.clientes.destroy', $c->idcliente) }}" method="POST" onsubmit="return confirm('¿Eliminar cliente?')">
                @csrf @method('DELETE')
                <flux:button type="submit" size="sm" variant="ghost" class="text-red-600">Eliminar</flux:button>
            </form>
        </div>
    </div>
    @empty
    <div class="bg-white rounded-lg p-6 text-center text-gray-500">No hay clientes.</div>
    @endforelse
</div>
@endsection
