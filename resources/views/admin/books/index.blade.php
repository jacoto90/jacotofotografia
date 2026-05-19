@extends('layouts.admin')

@section('title', 'Books')

@section('content')
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
    <flux:heading size="xl">Books de Fotos</flux:heading>
    <flux:button as="a" href="{{ route('admin.books.create') }}" variant="primary">+ Nuevo Book</flux:button>
</div>

@if(session('success'))
<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-sm">{{ session('success') }}</div>
@endif

<div class="hidden md:block bg-white rounded-lg shadow-sm overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-[#c8e7d8]">
            <tr>
                <th class="text-left p-3">Portada</th>
                <th class="text-left p-3">Nombre</th>
                <th class="text-left p-3">Cliente</th>
                <th class="text-left p-3">Password</th>
                <th class="text-left p-3">Fotos</th>
                <th class="text-left p-3">Creado</th>
                <th class="text-left p-3">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($books as $b)
            @php
                $coverPublic = public_path($b->nombrebook . '/foto_portada.jpg');
                $coverUploaded = public_path('storage/books/' . $b->idbookfotos . '/foto_portada.jpg');
                $coverUrl = '';
                if (file_exists($coverPublic)) {
                    $coverUrl = asset($b->nombrebook . '/foto_portada.jpg');
                } elseif (file_exists($coverUploaded)) {
                    $coverUrl = asset('storage/books/' . $b->idbookfotos . '/foto_portada.jpg');
                }
                $photoCount = 0;
                $oldwebDir = resource_path('oldweb/' . $b->nombrebook);
                if (is_dir($oldwebDir)) {
                    $photoCount = count(array_filter(scandir($oldwebDir), fn($f) => in_array(strtolower(pathinfo($f, PATHINFO_EXTENSION)), ['jpg','jpeg','png','gif'])));
                }
            @endphp
            <tr class="border-t border-gray-100 hover:bg-gray-50">
                <td class="p-3">
                    @if($coverUrl)
                    <img src="{{ $coverUrl }}" alt="" class="w-16 h-12 object-cover rounded">
                    @else
                    <div class="w-16 h-12 bg-gray-200 rounded flex items-center justify-center text-xs text-gray-400">Sin</div>
                    @endif
                </td>
                <td class="p-3 font-medium">{{ $b->nombrebook }}</td>
                <td class="p-3">{{ $b->cliente?->nombre }} {{ $b->cliente?->apellido }}</td>
                <td class="p-3 font-mono text-xs">{{ $b->pwd ? str_repeat('*', strlen($b->pwd)) : '---' }}</td>
                <td class="p-3">{{ $photoCount }}</td>
                <td class="p-3 text-xs">{{ $b->created_at->format('d/m/Y') }}</td>
                <td class="p-3">
                    <div class="flex items-center gap-1">
                        <flux:button as="a" href="{{ route('admin.books.show', $b->idbookfotos) }}" size="sm" variant="ghost" icon-trailing="photo">Fotos</flux:button>
                        <flux:button as="a" href="{{ route('admin.books.edit', $b->idbookfotos) }}" size="sm" variant="ghost" icon-trailing="pencil">Editar</flux:button>
                        <form action="{{ route('admin.books.destroy', $b->idbookfotos) }}" method="POST" class="inline" onsubmit="return confirm('¿Eliminar este book? Las fotos no se borrarán del servidor.')">
                            @csrf @method('DELETE')
                            <flux:button type="submit" size="sm" variant="ghost" icon-trailing="trash" class="text-red-600 hover:text-red-800">Eliminar</flux:button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="7" class="p-6 text-center text-gray-500">No hay books. Crea el primero.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="md:hidden space-y-4">
    @forelse($books as $b)
    @php
        $coverPublic = public_path($b->nombrebook . '/foto_portada.jpg');
        $coverUploaded = public_path('storage/books/' . $b->idbookfotos . '/foto_portada.jpg');
        $coverUrl = '';
        if (file_exists($coverPublic)) {
            $coverUrl = asset($b->nombrebook . '/foto_portada.jpg');
        } elseif (file_exists($coverUploaded)) {
            $coverUrl = asset('storage/books/' . $b->idbookfotos . '/foto_portada.jpg');
        }
        $photoCount = 0;
        $oldwebDir = resource_path('oldweb/' . $b->nombrebook);
        if (is_dir($oldwebDir)) {
            $photoCount = count(array_filter(scandir($oldwebDir), fn($f) => in_array(strtolower(pathinfo($f, PATHINFO_EXTENSION)), ['jpg','jpeg','png','gif'])));
        }
    @endphp
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <div class="flex gap-4 p-4">
            @if($coverUrl)
            <img src="{{ $coverUrl }}" alt="" class="w-20 h-16 object-cover rounded flex-shrink-0">
            @else
            <div class="w-20 h-16 bg-gray-200 rounded flex items-center justify-center text-xs text-gray-400 flex-shrink-0">Sin</div>
            @endif
            <div class="flex-1 min-w-0">
                <h3 class="font-semibold truncate">{{ $b->nombrebook }}</h3>
                <p class="text-xs text-gray-500">{{ $b->cliente?->nombre }} {{ $b->cliente?->apellido }}</p>
                <div class="flex items-center gap-3 mt-1 text-xs text-gray-400">
                    <span>{{ $photoCount }} fotos</span>
                    <span>{{ $b->created_at->format('d/m/Y') }}</span>
                </div>
            </div>
        </div>
        <div class="flex border-t border-gray-100 divide-x divide-gray-100">
            <flux:button as="a" href="{{ route('admin.books.show', $b->idbookfotos) }}" size="sm" variant="ghost" class="flex-1 justify-center rounded-none">Fotos</flux:button>
            <flux:button as="a" href="{{ route('admin.books.edit', $b->idbookfotos) }}" size="sm" variant="ghost" class="flex-1 justify-center rounded-none">Editar</flux:button>
            <form action="{{ route('admin.books.destroy', $b->idbookfotos) }}" method="POST" class="flex-1" onsubmit="return confirm('¿Eliminar este book?')">
                @csrf @method('DELETE')
                <flux:button type="submit" size="sm" variant="ghost" class="w-full justify-center rounded-none text-red-600">Eliminar</flux:button>
            </form>
        </div>
    </div>
    @empty
    <div class="bg-white rounded-lg p-6 text-center text-gray-500">No hay books. Crea el primero.</div>
    @endforelse
</div>
@endsection
