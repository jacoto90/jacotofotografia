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
                    <div class="flex items-center gap-2">
                        <a href="{{ route('admin.clientes.edit', $c->idcliente) }}" style="display:inline-flex;align-items:center;gap:4px;padding:4px 10px;border-radius:6px;border:1px solid #c8e7d8;color:#4e5e72!important;font-size:13px;text-decoration:none;white-space:nowrap"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px"><path d="M17 3a2.85 2.85 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/></svg>Editar</a>
                        <form action="{{ route('admin.clientes.destroy', $c->idcliente) }}" method="POST" class="inline" onsubmit="return confirm('¿Eliminar cliente?')">
                            @csrf @method('DELETE')
                            <button type="submit" style="display:inline-flex;align-items:center;gap:4px;padding:4px 10px;border-radius:6px;border:1px solid #fca5a5;color:#dc2626!important;font-size:13px;cursor:pointer;background:none"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg>Eliminar</button>
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
            <a href="{{ route('admin.clientes.edit', $c->idcliente) }}" style="display:inline-flex;align-items:center;gap:4px;padding:4px 10px;border-radius:6px;border:1px solid #c8e7d8;color:#4e5e72!important;font-size:13px;text-decoration:none">Editar</a>
            <form action="{{ route('admin.clientes.destroy', $c->idcliente) }}" method="POST" onsubmit="return confirm('¿Eliminar cliente?')">
                @csrf @method('DELETE')
                <button type="submit" style="display:inline-flex;align-items:center;gap:4px;padding:4px 10px;border-radius:6px;border:1px solid #fca5a5;color:#dc2626!important;font-size:13px;cursor:pointer;background:none">Eliminar</button>
            </form>
        </div>
    </div>
    @empty
    <div class="bg-white rounded-lg p-6 text-center text-gray-500">No hay clientes.</div>
    @endforelse
</div>
@endsection
