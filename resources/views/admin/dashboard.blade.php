@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<flux:heading size="xl" class="mb-6">Dashboard</flux:heading>

<div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 mb-8">
    <div class="bg-white p-4 md:p-6 rounded-lg shadow-sm border-l-4 border-[#FC9B67]">
        <p class="text-xs md:text-sm text-gray-500">Clientes</p>
        <p class="text-2xl md:text-3xl font-bold">{{ $totalClientes }}</p>
    </div>
    <div class="bg-white p-4 md:p-6 rounded-lg shadow-sm border-l-4 border-[#A9DFBF]">
        <p class="text-xs md:text-sm text-gray-500">Books</p>
        <p class="text-2xl md:text-3xl font-bold">{{ $totalBooks }}</p>
    </div>
    <div class="bg-white p-4 md:p-6 rounded-lg shadow-sm border-l-4 border-[#4e5e72]">
        <p class="text-xs md:text-sm text-gray-500">Mensajes</p>
        <p class="text-2xl md:text-3xl font-bold">{{ $totalMensajes }}</p>
    </div>
    <div class="bg-white p-4 md:p-6 rounded-lg shadow-sm border-l-4 border-red-400">
        <p class="text-xs md:text-sm text-gray-500">Pendientes</p>
        <p class="text-2xl md:text-3xl font-bold">{{ $pendientes }}</p>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="bg-white p-6 rounded-lg shadow-sm">
        <h3 class="font-semibold mb-4">Acciones r&aacute;pidas</h3>
        <div class="space-y-3">
            <a href="{{ route('admin.clientes.create') }}" class="block text-[#4e5e72] hover:text-[#FC9B67] font-medium">+ Nuevo cliente</a>
            <a href="{{ route('admin.books.create') }}" class="block text-[#4e5e72] hover:text-[#FC9B67] font-medium">+ Nuevo book</a>
            <a href="{{ route('admin.mensajes') }}" class="block text-[#4e5e72] hover:text-[#FC9B67] font-medium">Ver mensajes pendientes</a>
        </div>
    </div>
</div>
@endsection
