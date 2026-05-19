<?php

namespace App\Http\Controllers;

use App\Models\Bookfoto;
use App\Models\Visitante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public function home()
    {
        $path = public_path();
        $carruselDirs = ['carrusel0', 'carrusel1'];

        $carousel1 = [];
        $carousel2 = [];

        if (is_dir($base = resource_path('oldweb'))) {
            foreach (['carrusel0', 'carrusel1'] as $i => $dir) {
                $dirPath = $base . DIRECTORY_SEPARATOR . $dir;
                if (is_dir($dirPath)) {
                    $files = array_values(array_diff(scandir($dirPath), ['.', '..']));
                    $var = $i === 0 ? 'carousel1' : 'carousel2';
                    foreach ($files as $file) {
                        $relativePath = $dir . '/' . $file;
                        if (file_exists($base . DIRECTORY_SEPARATOR . $relativePath)) {
                            $$var[] = $relativePath;
                        }
                    }
                }
            }
        }

        return view('home', compact('carousel1', 'carousel2'));
    }

    public function clientes()
    {
        $bookfotos = Bookfoto::with('cliente')->get();
        return view('clientes', compact('bookfotos'));
    }

    public function bookAccess(Request $request)
    {
        $request->validate(['id' => 'required|integer', 'pwd' => 'required']);

        $book = Bookfoto::findOrFail($request->id);

        if ($request->pwd !== $book->pwd) {
            Session::flash('incorrect_password_book_id', $book->idbookfotos);
            Session::flash('error', 'Contraseña incorrecta');
            return redirect()->route('clientes');
        }

        $base = resource_path('oldweb');
        $dirPath = $base . DIRECTORY_SEPARATOR . $book->nombrebook;
        $images = [];

        $extensions = ['jpg', 'jpeg', 'gif', 'png', 'bmp'];

        if (is_dir($dirPath)) {
            $files = scandir($dirPath);
            foreach ($files as $file) {
                $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                if (in_array($ext, $extensions)) {
                    $images[] = $book->nombrebook . '/' . $file;
                }
            }
        }

        $disk = Storage::disk('public');
        $photoDir = 'books/' . $book->idbookfotos;
        if ($disk->exists($photoDir)) {
            $files = $disk->files($photoDir);
            foreach ($files as $file) {
                $name = basename($file);
                $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
                if (in_array($ext, $extensions)) {
                    $images[] = 'storage/' . $file;
                }
            }
        }

        sort($images);

        return view('book', compact('book', 'images'));
    }

    public function bookDownload(Request $request)
    {
        $request->validate(['selectedImages' => 'required|array', 'book_id' => 'required|integer']);

        $base = resource_path('oldweb');
        $zip = new \ZipArchive();
        $zipName = tempnam(sys_get_temp_dir(), 'fotos_') . '.zip';
        $zip->open($zipName, \ZipArchive::CREATE);

        foreach ($request->selectedImages as $image) {
            $imagePath = $base . DIRECTORY_SEPARATOR . $image;
            if (file_exists($imagePath)) {
                $zip->addFile($imagePath, basename($image));
            }

            $storagePath = storage_path('app/public/' . str_replace('storage/', '', $image));
            if (file_exists($storagePath)) {
                $zip->addFile($storagePath, basename($image));
            }
        }
        $zip->close();

        return response()->download($zipName, 'fotos.zip')->deleteFileAfterSend(true);
    }

    public function contacto()
    {
        return view('contacto');
    }

    public function contactoEnviar(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'cname' => 'required|min:3',
            'mobil' => 'required|regex:/^[67][0-9]{8}$/',
            'email' => 'required|email',
            'mensaje' => 'required|min:10',
        ], [
            'mobil.regex' => 'El teléfono debe comenzar por 6 o 7 y tener 9 dígitos.',
        ]);

        Visitante::create([
            'nombre' => $request->name,
            'apellido' => $request->cname,
            'email' => $request->email,
            'mensaje' => $request->mensaje,
            'mobil' => $request->mobil,
        ]);

        return redirect()->route('contacto')->with('success', 'Mensaje enviado correctamente. Le contestaremos en breve.');
    }

    public function jacoto()
    {
        return view('jacoto');
    }
}
