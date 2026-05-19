@extends('layouts.admin')

@section('title', $book->nombrebook)

@section('content')
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
    <div>
        <flux:heading size="xl">{{ $book->nombrebook }}</flux:heading>
        <p class="text-sm text-gray-500 mt-1">
            Cliente: {{ $book->cliente?->nombre }} {{ $book->cliente?->apellido }} &middot;
            Password: <span class="font-mono">{{ $book->pwd }}</span>
        </p>
    </div>
    <div class="flex gap-2">
        <flux:button as="a" href="{{ route('admin.books.edit', $book->idbookfotos) }}" variant="ghost" icon-trailing="pencil">Editar Book</flux:button>
        <flux:button as="a" href="{{ route('admin.books.index') }}" variant="ghost">Volver</flux:button>
    </div>
</div>

@if(session('success'))
<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-sm">{{ session('success') }}</div>
@endif

<div class="bg-white p-6 rounded-lg shadow-sm mb-6">
    <h3 class="font-semibold mb-4">Subir fotos</h3>
    <form method="POST" action="{{ route('admin.books.photos.upload', $book->idbookfotos) }}" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div>
            <flux:field>
                <flux:label>Seleccionar fotos</flux:label>
                <input type="file" name="photos[]" multiple accept="image/jpeg,image/png,image/gif"
                       class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-[#c8e7d8] file:text-[#4e5e72] hover:file:bg-[#a9dfc0] cursor-pointer">
                <flux:error name="photos" />
                <flux:error name="photos.*" />
                <flux:description>JPEG, PNG o GIF. Máx 10MB por foto</flux:description>
            </flux:field>
        </div>
        <flux:button type="submit" variant="primary">Subir fotos</flux:button>
    </form>
</div>

@php
    $oldwebDir = resource_path('oldweb/' . $book->nombrebook);
    $oldwebPhotos = [];
    if (is_dir($oldwebDir)) {
        $files = scandir($oldwebDir);
        foreach ($files as $f) {
            $ext = strtolower(pathinfo($f, PATHINFO_EXTENSION));
            if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif'])) {
                $oldwebPhotos[] = [
                    'name' => $f,
                    'url' => asset($book->nombrebook . '/' . $f),
                    'is_cover' => $f === 'foto_portada.jpg',
                    'source' => 'FTP',
                ];
            }
        }
        sort($oldwebPhotos);
    }
    $allPhotos = array_merge($oldwebPhotos, $uploadedPhotos);
@endphp

<div class="bg-white rounded-lg shadow-sm overflow-hidden">
    <div class="p-4 border-b border-gray-100 flex justify-between items-center">
        <h3 class="font-semibold">Fotos ({{ count($allPhotos) }})</h3>
    </div>

    @if(count($allPhotos) > 0)
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4 p-4">
        @foreach($allPhotos as $photo)
        <div class="relative group rounded-lg overflow-hidden border border-gray-200">
            <img src="{{ $photo['url'] }}" alt="{{ $photo['name'] }}" class="w-full aspect-[4/3] object-cover">
            <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                @if(!$photo['is_cover'])
                <form method="POST" action="{{ route('admin.books.photos.cover', [$book->idbookfotos, $photo['name']]) }}" class="inline">
                    @csrf
                    <button type="submit" title="Establecer como portada" class="bg-white/90 hover:bg-white text-xs px-2 py-1 rounded font-medium">Portada</button>
                </form>
                @endif
                @if(($photo['source'] ?? '') !== 'FTP')
                <form method="POST" action="{{ route('admin.books.photos.delete', $book->idbookfotos) }}" class="inline" onsubmit="return confirm('¿Eliminar esta foto?')">
                    @csrf @method('DELETE')
                    <input type="hidden" name="photo" value="{{ $photo['name'] }}">
                    <button type="submit" title="Eliminar" class="bg-red-500/90 hover:bg-red-500 text-white text-xs px-2 py-1 rounded font-medium">Eliminar</button>
                </form>
                @endif
            </div>
            @if($photo['is_cover'])
            <div class="absolute top-1 left-1 bg-[#FC9B67] text-white text-xs px-1.5 py-0.5 rounded font-medium">Portada</div>
            @endif
            @if(($photo['source'] ?? '') === 'FTP')
            <div class="absolute top-1 right-1 bg-gray-700/70 text-white text-[10px] px-1 py-0.5 rounded">FTP</div>
            @endif
        </div>
        @endforeach
    </div>
    @else
    <div class="p-10 text-center text-gray-500">
        <p class="text-lg mb-2">No hay fotos en este book</p>
        <p class="text-sm">Sube fotos usando el formulario de arriba, o súbelas por FTP a <code class="bg-gray-100 px-1 rounded">resources/oldweb/{{ $book->nombrebook }}/</code></p>
    </div>
    @endif
</div>
@endsection
