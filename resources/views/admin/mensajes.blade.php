@extends('layouts.admin')

@section('title', 'Mensajes')

@section('content')
<flux:heading size="xl" class="mb-6">Mensajes de Visitantes</flux:heading>

<div class="hidden md:block bg-white rounded-lg shadow-sm overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-[#c8e7d8]">
            <tr>
                <th class="text-left p-3">Nombre</th>
                <th class="text-left p-3">Email</th>
                <th class="text-left p-3">M&oacute;vil</th>
                <th class="text-left p-3">Mensaje</th>
                <th class="text-left p-3">Estado</th>
                <th class="text-left p-3">Fecha</th>
                <th class="text-left p-3">Acci&oacute;n</th>
            </tr>
        </thead>
        <tbody>
            @forelse($mensajes as $m)
            <tr class="border-t border-gray-100 {{ !$m->gestionado ? 'bg-yellow-50' : '' }}">
                <td class="p-3">{{ $m->nombre }} {{ $m->apellido }}</td>
                <td class="p-3">
                    <a href="mailto:{{ $m->email }}" class="text-blue-600 hover:underline">{{ $m->email }}</a>
                </td>
                <td class="p-3">{{ $m->mobil }}</td>
                <td class="p-3 max-w-xs truncate" title="{{ $m->mensaje }}">{{ $m->mensaje }}</td>
                <td class="p-3">
                    <span class="px-2 py-1 rounded text-xs {{ $m->gestionado ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                        {{ $m->gestionado ? 'Gestionado' : 'Pendiente' }}
                    </span>
                </td>
                <td class="p-3 text-xs">{{ $m->created_at->format('d/m/Y H:i') }}</td>
                <td class="p-3">
                    <form action="{{ route('admin.mensajes.toggle', $m->id) }}" method="POST">
                        @csrf
                        <flux:button type="submit" size="sm" variant="ghost">
                            {{ $m->gestionado ? 'Pendiente' : 'Gestionado' }}
                        </flux:button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="7" class="p-6 text-center text-gray-500">No hay mensajes.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="md:hidden space-y-4">
    @forelse($mensajes as $m)
    <div class="bg-white rounded-lg shadow-sm p-4 {{ !$m->gestionado ? 'border-l-4 border-yellow-400' : '' }}">
        <div class="flex justify-between items-start">
            <div>
                <h3 class="font-semibold text-sm">{{ $m->nombre }} {{ $m->apellido }}</h3>
                <a href="mailto:{{ $m->email }}" class="text-xs text-blue-600 hover:underline block">{{ $m->email }}</a>
            </div>
            <span class="px-2 py-1 rounded text-xs {{ $m->gestionado ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                {{ $m->gestionado ? 'Gestionado' : 'Pendiente' }}
            </span>
        </div>
        <p class="text-xs text-gray-500 mt-2">{{ $m->mobil }} &middot; {{ $m->created_at->format('d/m/Y H:i') }}</p>
        <p class="text-sm mt-2">{{ $m->mensaje }}</p>
        <div class="mt-3">
            <form action="{{ route('admin.mensajes.toggle', $m->id) }}" method="POST">
                @csrf
                <flux:button type="submit" size="sm" variant="primary">
                    {{ $m->gestionado ? 'Marcar pendiente' : 'Marcar gestionado' }}
                </flux:button>
            </form>
        </div>
    </div>
    @empty
    <div class="bg-white rounded-lg p-6 text-center text-gray-500">No hay mensajes.</div>
    @endforelse
</div>
@endsection
