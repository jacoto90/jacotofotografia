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
        $carousel1 = [];
        $carousel2 = [];

        foreach (['carrusel0', 'carrusel1'] as $i => $dir) {
            $dirPath = public_path($dir);
            if (is_dir($dirPath)) {
                $files = array_values(array_diff(scandir($dirPath), ['.', '..']));
                $var = $i === 0 ? 'carousel1' : 'carousel2';
                foreach ($files as $file) {
                    $$var[] = $dir . '/' . $file;
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

        $images = [];
        $extensions = ['jpg', 'jpeg', 'gif', 'png', 'bmp'];

        $dirPath = public_path($book->nombrebook);
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

        $zip = new \ZipArchive();
        $zipName = tempnam(sys_get_temp_dir(), 'fotos_') . '.zip';
        $zip->open($zipName, \ZipArchive::CREATE);

        foreach ($request->selectedImages as $image) {
            $imagePath = public_path($image);
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
            'name' => 'required|min:3|max:40',
            'cname' => 'required|min:3|max:60',
            'mobil' => 'required|regex:/^[67][0-9]{8}$/',
            'email' => 'required|email|max:80',
            'mensaje' => 'required|min:10|max:1000',
        ], [
            'mobil.regex' => 'El teléfono debe comenzar por 6 o 7 y tener 9 dígitos.',
            'mensaje.max' => 'El mensaje no puede superar 1000 caracteres.',
        ]);

        // Honeypot check
        if (!empty($request->localidad)) {
            return redirect()->route('contacto')->with('success', 'Mensaje enviado correctamente. Le contestaremos en breve.');
        }

        // Time gate: reject if submitted in under 3 seconds (bots)
        $submittedAt = $request->input('_t');
        if (!$submittedAt || (time() - intval($submittedAt) < 3)) {
            return redirect()->route('contacto')->with('error', 'Hubo un error al enviar el mensaje. Inténtalo de nuevo.');
        }

        // Email MX DNS check
        $domain = substr(strrchr($request->email, '@'), 1);
        if (!$domain || !checkdnsrr($domain, 'MX')) {
            return redirect()->route('contacto')->with('error', 'El dominio del email no existe o no recibe correos.');
        }

        // Message coherence checks
        $mensaje = $request->mensaje;

        // Block if >50% of message is uppercase (shouting/spam)
        $upperRatio = mb_strlen(preg_replace('/[^A-ZÑÁÉÍÓÚ]/u', '', $mensaje)) / max(mb_strlen(preg_replace('/[^a-zA-ZáéíóúñÁÉÍÓÚÑ\s]/u', '', $mensaje)), 1);
        if ($upperRatio > 0.5 && mb_strlen($mensaje) > 20) {
            return redirect()->route('contacto')->with('error', 'El mensaje no puede estar escrito mayoritariamente en mayúsculas.');
        }

        // Block if >3 links (common spam pattern)
        preg_match_all('/https?:\/\/[^\s]+/', $mensaje, $links);
        if (count($links[0]) > 3) {
            return redirect()->route('contacto')->with('error', 'El mensaje contiene demasiados enlaces.');
        }

        // Block gibberish: repeated single char >60% of message
        $chars = count_chars($mensaje, 1);
        if ($chars) {
            $maxFreq = max($chars);
            if ($maxFreq / mb_strlen($mensaje) > 0.6) {
                return redirect()->route('contacto')->with('error', 'El mensaje no parece válido.');
            }
        }

        Visitante::create([
            'nombre' => $request->name,
            'apellido' => $request->cname,
            'email' => $request->email,
            'mensaje' => $mensaje,
            'mobil' => $request->mobil,
        ]);

        return redirect()->route('contacto')->with('success', 'Mensaje enviado correctamente. Le contestaremos en breve.');
    }

    public function jacoto()
    {
        return view('jacoto');
    }
}
