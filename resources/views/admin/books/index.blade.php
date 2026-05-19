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
                $coverPath = public_path($b->nombrebook . '/foto_portada.jpg');
                $coverUploaded = public_path('storage/books/' . $b->idbookfotos . '/foto_portada.jpg');
                $coverUrl = '';
                $coverTs = '';
                if (file_exists($coverPath)) {
                    $coverTs = filemtime($coverPath);
                    $coverUrl = asset($b->nombrebook . '/foto_portada.jpg') . '?v=' . $coverTs;
                } elseif (file_exists($coverUploaded)) {
                    $coverTs = filemtime($coverUploaded);
                    $coverUrl = asset('storage/books/' . $b->idbookfotos . '/foto_portada.jpg') . '?v=' . $coverTs;
                }
                $photoCount = 0;
                $ftpDir = public_path($b->nombrebook);
                if (is_dir($ftpDir)) {
                    $photoCount += count(array_filter(scandir($ftpDir), fn($f) => in_array(strtolower(pathinfo($f, PATHINFO_EXTENSION)), ['jpg','jpeg','png','gif'])));
                }
                $upDir = public_path('storage/books/' . $b->idbookfotos);
                if (is_dir($upDir)) {
                    $photoCount += count(array_filter(scandir($upDir), fn($f) => in_array(strtolower(pathinfo($f, PATHINFO_EXTENSION)), ['jpg','jpeg','png','gif'])));
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
                    <div class="flex items-center gap-2">
                        <a href="{{ route('admin.books.show', $b->idbookfotos) }}" style="display:inline-flex;align-items:center;gap:4px;padding:4px 10px;border-radius:6px;border:1px solid #c8e7d8;color:#4e5e72!important;font-size:13px;text-decoration:none;white-space:nowrap"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="m21 15-5-5L5 21"/></svg>Fotos</a>
                        <a href="{{ route('admin.books.edit', $b->idbookfotos) }}" style="display:inline-flex;align-items:center;gap:4px;padding:4px 10px;border-radius:6px;border:1px solid #c8e7d8;color:#4e5e72!important;font-size:13px;text-decoration:none;white-space:nowrap"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px"><path d="M17 3a2.85 2.85 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/></svg>Editar</a>
                        <form action="{{ route('admin.books.destroy', $b->idbookfotos) }}" method="POST" class="inline" onsubmit="return confirm('¿Eliminar este book? Las fotos no se borrarán del servidor.')">
                            @csrf @method('DELETE')
                            <button type="submit" style="display:inline-flex;align-items:center;gap:4px;padding:4px 10px;border-radius:6px;border:1px solid #fca5a5;color:#dc2626!important;font-size:13px;cursor:pointer;background:none"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg>Eliminar</button>
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
        $coverPath = public_path($b->nombrebook . '/foto_portada.jpg');
        $coverUploaded = public_path('storage/books/' . $b->idbookfotos . '/foto_portada.jpg');
        $coverUrl = '';
        $coverTs = '';
        if (file_exists($coverPath)) {
            $coverTs = filemtime($coverPath);
            $coverUrl = asset($b->nombrebook . '/foto_portada.jpg') . '?v=' . $coverTs;
        } elseif (file_exists($coverUploaded)) {
            $coverTs = filemtime($coverUploaded);
            $coverUrl = asset('storage/books/' . $b->idbookfotos . '/foto_portada.jpg') . '?v=' . $coverTs;
        }
        $photoCount = 0;
        $ftpDir = public_path($b->nombrebook);
        if (is_dir($ftpDir)) {
            $photoCount += count(array_filter(scandir($ftpDir), fn($f) => in_array(strtolower(pathinfo($f, PATHINFO_EXTENSION)), ['jpg','jpeg','png','gif'])));
        }
        $upDir = public_path('storage/books/' . $b->idbookfotos);
        if (is_dir($upDir)) {
            $photoCount += count(array_filter(scandir($upDir), fn($f) => in_array(strtolower(pathinfo($f, PATHINFO_EXTENSION)), ['jpg','jpeg','png','gif'])));
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
            <a href="{{ route('admin.books.show', $b->idbookfotos) }}" class="flex-1 text-center py-2 text-sm" style="color:#4e5e72!important;text-decoration:none">Fotos</a>
            <a href="{{ route('admin.books.edit', $b->idbookfotos) }}" class="flex-1 text-center py-2 text-sm" style="color:#4e5e72!important;text-decoration:none">Editar</a>
            <form action="{{ route('admin.books.destroy', $b->idbookfotos) }}" method="POST" class="flex-1" onsubmit="return confirm('¿Eliminar este book?')">
                @csrf @method('DELETE')
                <button type="submit" class="w-full text-center py-2 text-sm" style="color:#dc2626!important;background:none;border:none;cursor:pointer">Eliminar</button>
            </form>
        </div>
    </div>
    @empty
    <div class="bg-white rounded-lg p-6 text-center text-gray-500">No hay books. Crea el primero.</div>
    @endforelse
</div>
@endsection
