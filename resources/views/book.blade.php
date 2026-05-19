@extends('layouts.app')

@section('title', $book->nombrebook)
@section('description', 'Galería de fotos de ' . $book->nombrebook)

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <div class="text-center mb-8">
        <flux:heading size="lg">Bienvenido al Book</flux:heading>
        <p class="text-lg text-[#4e5e72] mt-2">{{ $book->nombrebook }}</p>
    </div>

    <form id="downloadForm" method="POST" action="{{ route('book.download') }}" class="space-y-4">
        @csrf
        <input type="hidden" name="book_id" value="{{ $book->idbookfotos }}">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($images as $image)
            <div class="relative bg-white rounded-lg shadow-md overflow-hidden group">
                <img src="{{ asset($image) }}" alt="Foto" class="w-full h-64 object-cover" loading="lazy">
                <div class="absolute bottom-2 right-2 opacity-0 group-hover:opacity-100 transition-opacity">
                    <input type="checkbox" name="selectedImages[]" value="{{ $image }}"
                           class="w-5 h-5 accent-[#FC9B67] cursor-pointer"
                           title="Seleccionar para descargar">
                </div>
            </div>
            @endforeach
        </div>

        <div class="fixed top-32 right-4 flex flex-col gap-2 z-50">
            <flux:button type="button" size="sm" title="Seleccionar todas" onclick="selectAll()">✓</flux:button>
            <flux:button type="button" size="sm" title="Deseleccionar todas" onclick="deselectAll()">⟦⟧</flux:button>
            <flux:button type="button" size="sm" title="Descargar seleccionadas" onclick="validateAndDownload()">⇩</flux:button>
        </div>

        <div class="fixed top-32 left-4 z-50">
            <flux:button type="button" size="sm" id="autoScrollBtn" onclick="toggleAutoScroll()">▶</flux:button>
        </div>
    </form>
</div>

<script>
    let scrollInterval;
    const speed = 1;
    let isAutoScrolling = false;

    function toggleAutoScroll() {
        if (isAutoScrolling) {
            clearInterval(scrollInterval);
            isAutoScrolling = false;
            document.getElementById('autoScrollBtn').textContent = '▶';
        } else {
            scrollInterval = setInterval(() => { window.scrollBy(0, speed); }, 16);
            isAutoScrolling = true;
            document.getElementById('autoScrollBtn').textContent = '⏸';
        }
    }

    function selectAll() {
        document.querySelectorAll('input[name="selectedImages\\[\\]"]').forEach(cb => cb.checked = true);
    }

    function deselectAll() {
        document.querySelectorAll('input[name="selectedImages\\[\\]"]').forEach(cb => cb.checked = false);
    }

    function validateAndDownload() {
        const checked = document.querySelectorAll('input[name="selectedImages\\[\\]"]:checked');
        if (checked.length === 0) {
            alert('Por favor, selecciona al menos una foto para descargar.');
            return;
        }
        document.getElementById('downloadForm').submit();
    }
</script>
@endsection
