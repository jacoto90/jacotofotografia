<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/clientes', [PageController::class, 'clientes'])->name('clientes');
Route::post('/book/access', [PageController::class, 'bookAccess'])->name('book.access');
Route::post('/book/download', [PageController::class, 'bookDownload'])->name('book.download');
Route::get('/contacto', [PageController::class, 'contacto'])->name('contacto');
Route::post('/contacto/enviar', [PageController::class, 'contactoEnviar'])->name('contacto.enviar');
Route::get('/jacoto', [PageController::class, 'jacoto'])->name('jacoto');

Route::get('/admin/login', [AdminController::class, 'loginForm'])->name('login');
Route::post('/admin/login', [AdminController::class, 'login'])->middleware('throttle:5,60')->name('admin.login.post');
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/mensajes', [AdminController::class, 'mensajes'])->name('mensajes');
    Route::post('/mensajes/{id}/toggle', [AdminController::class, 'toggleGestionado'])->name('mensajes.toggle');
    Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
    Route::put('/settings', [AdminController::class, 'settingsUpdate'])->name('settings.update');
    Route::get('/clientes', [AdminController::class, 'clientesIndex'])->name('clientes.index');
    Route::get('/clientes/crear', [AdminController::class, 'clientesCreate'])->name('clientes.create');
    Route::post('/clientes', [AdminController::class, 'clientesStore'])->name('clientes.store');
    Route::get('/clientes/{id}/editar', [AdminController::class, 'clientesEdit'])->name('clientes.edit');
    Route::put('/clientes/{id}', [AdminController::class, 'clientesUpdate'])->name('clientes.update');
    Route::delete('/clientes/{id}', [AdminController::class, 'clientesDestroy'])->name('clientes.destroy');
    Route::get('/books', [AdminController::class, 'booksIndex'])->name('books.index');
    Route::get('/books/crear', [AdminController::class, 'booksCreate'])->name('books.create');
    Route::post('/books', [AdminController::class, 'booksStore'])->name('books.store');
    Route::get('/books/{id}', [AdminController::class, 'booksShow'])->name('books.show');
    Route::get('/books/{id}/editar', [AdminController::class, 'booksEdit'])->name('books.edit');
    Route::put('/books/{id}', [AdminController::class, 'booksUpdate'])->name('books.update');
    Route::delete('/books/{id}', [AdminController::class, 'booksDestroy'])->name('books.destroy');
    Route::post('/books/{id}/photos/upload', [AdminController::class, 'booksUploadPhotos'])->name('books.photos.upload');
    Route::delete('/books/{id}/photos', [AdminController::class, 'booksDeletePhoto'])->name('books.photos.delete');
    Route::post('/books/{id}/photos/cover', [AdminController::class, 'booksSetCover'])->name('books.photos.cover');
});
