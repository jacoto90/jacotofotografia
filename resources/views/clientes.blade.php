@extends('layouts.app')

@section('title', 'Clientes')
@section('description', 'Galería de clientes de Jacoto Fotografía. Accede a tus fotos protegidas con contraseña.')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8 mt-20">
    <h1 class="text-3xl font-bold text-center mb-8 text-[#4e5e72]">Galer&iacute;a de Clientes</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @forelse ($bookfotos as $index => $book)
        <div id="book_{{ $book->idbookfotos }}"
             class="bg-white rounded-lg shadow-md overflow-hidden cursor-pointer hover:scale-[1.03] transition-transform duration-300"
             onclick="openModal({{ $book->idbookfotos }}, '{{ $book->nombrebook }}')">
            @php
                $coverFtp = public_path($book->nombrebook . '/foto_portada.jpg');
                $coverUploaded = public_path('storage/books/' . $book->idbookfotos . '/foto_portada.jpg');
                $src = '';
                $v = '';
                if (file_exists($coverFtp)) {
                    $v = filemtime($coverFtp);
                    $src = asset($book->nombrebook . '/foto_portada.jpg') . '?v=' . $v;
                } elseif (file_exists($coverUploaded)) {
                    $v = filemtime($coverUploaded);
                    $src = asset('storage/books/' . $book->idbookfotos . '/foto_portada.jpg') . '?v=' . $v;
                }
            @endphp
            @if($src)
            <img src="{{ $src }}" alt="{{ $book->nombrebook }}" class="w-full h-48 object-cover" loading="lazy">
            @else
            <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-400 text-sm">Sin portada</div>
            @endif
            <div class="p-4 text-center">
                <h5 class="font-semibold text-[#4e5e72]">{{ $book->nombrebook }}</h5>
            </div>
        </div>
        @empty
        <div class="col-span-full text-center py-12">
            <p class="text-gray-500">No hay galer&iacute;as disponibles en este momento.</p>
        </div>
        @endforelse
    </div>
</div>

<div id="passwordModal" class="fixed inset-0 bg-black/60 z-50 hidden items-center justify-center" style="display:none;">
    <div class="bg-white p-8 rounded-lg shadow-xl w-full max-w-md mx-4">
        <div class="text-center mb-6">
            <h4 class="font-bold text-lg text-[#4e5e72]" id="modalBookName"></h4>
            <p class="text-sm text-gray-500 mt-1">&middot;JACOTO&middot;</p>
            <p class="text-xs text-gray-400 mt-2">Acceso de invitado. Introduce la contrase&ntilde;a para ver esta colecci&oacute;n.</p>
        </div>

        @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded text-sm text-center mb-4">
            {{ session('error') }}
        </div>
        @endif

        <form id="passwordForm" action="{{ route('book.access') }}" method="POST" class="space-y-4">
            @csrf
            <input type="hidden" name="id" id="bookId">
            <input type="password" name="pwd" placeholder="Contrase&ntilde;a" required
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-[#FC9B67] focus:ring-1 focus:ring-[#FC9B67] outline-none">
            <button type="submit"
                    class="w-full py-2 bg-[#4e5e72] text-white rounded-lg hover:bg-[#3d4a5a] transition-colors font-medium">
                ENTRAR
            </button>
        </form>

        <button onclick="closeModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 text-2xl leading-none">&times;</button>
    </div>
</div>

<script>
    function openModal(id, name) {
        document.getElementById('bookId').value = id;
        document.getElementById('modalBookName').textContent = name;
        document.getElementById('passwordModal').style.display = 'flex';
    }

    function closeModal() {
        document.getElementById('passwordModal').style.display = 'none';
    }

    document.getElementById('passwordModal').addEventListener('click', function(e) {
        if (e.target === this) closeModal();
    });

    @if(session('incorrect_password_book_id'))
    document.addEventListener('DOMContentLoaded', function() {
        const el = document.getElementById('book_{{ session('incorrect_password_book_id') }}');
        if (el) {
            el.scrollIntoView({ behavior: 'smooth', block: 'center' });
            setTimeout(() => {
                const book = {{ Illuminate\Support\Js::from(session('incorrect_password_book_id')) }};
                openModal(book, el.querySelector('h5')?.textContent || '');
            }, 500);
        }
    });
    @endif
</script>
@endsection
