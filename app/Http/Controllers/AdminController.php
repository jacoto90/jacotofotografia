<?php

namespace App\Http\Controllers;

use App\Models\Bookfoto;
use App\Models\Cliente;
use App\Models\Setting;
use App\Models\Visitante;
use App\Models\User;
use App\Notifications\AdminLoginNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function loginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            Setting::applyMailConfig();
            $notifyEmail = Setting::get('notify_email');
            if ($notifyEmail) {
                Notification::route('mail', $notifyEmail)
                    ->notify(new AdminLoginNotification(
                        $request->ip(),
                        $request->userAgent()
                    ));
            }
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email' => 'Credenciales incorrectas.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    public function dashboard()
    {
        $totalClientes = Cliente::count();
        $totalBooks = Bookfoto::count();
        $totalMensajes = Visitante::count();
        $pendientes = Visitante::where('gestionado', false)->count();
        return view('admin.dashboard', compact('totalClientes', 'totalBooks', 'totalMensajes', 'pendientes'));
    }

    public function mensajes()
    {
        $mensajes = Visitante::orderBy('created_at', 'desc')->get();
        return view('admin.mensajes', compact('mensajes'));
    }

    public function toggleGestionado($id)
    {
        $mensaje = Visitante::findOrFail($id);
        $mensaje->update(['gestionado' => !$mensaje->gestionado]);
        return back();
    }

    public function settings()
    {
        return view('admin.settings');
    }

    public function settingsUpdate(Request $request)
    {
        $request->validate([
            'notify_email' => 'nullable|email',
            'mail_host' => 'nullable|string|max:255',
            'mail_port' => 'nullable|string|max:10',
            'mail_username' => 'nullable|string|max:255',
            'mail_password' => 'nullable|string|max:255',
            'mail_encryption' => 'nullable|string|max:10',
            'mail_from_address' => 'nullable|email',
            'mail_from_name' => 'nullable|string|max:255',
        ]);

        foreach ($request->except('_token', '_method') as $key => $value) {
            Setting::set($key, $value ?? '');
        }

        return redirect()->route('admin.settings')->with('success', 'Configuración guardada correctamente.');
    }

    public function clientesIndex()
    {
        $clientes = Cliente::withCount('bookfotos')->get();
        return view('admin.clientes.index', compact('clientes'));
    }

    public function clientesCreate()
    {
        return view('admin.clientes.create');
    }

    public function clientesStore(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:40',
            'apellido' => 'required|max:60',
            'telefono' => 'required|max:12',
            'email' => 'required|email|max:80',
        ]);

        Cliente::create($request->all());
        return redirect()->route('admin.clientes.index')->with('success', 'Cliente creado correctamente.');
    }

    public function clientesEdit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('admin.clientes.edit', compact('cliente'));
    }

    public function clientesUpdate(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|max:40',
            'apellido' => 'required|max:60',
            'telefono' => 'required|max:12',
            'email' => 'required|email|max:80',
        ]);

        Cliente::findOrFail($id)->update($request->all());
        return redirect()->route('admin.clientes.index')->with('success', 'Cliente actualizado correctamente.');
    }

    public function clientesDestroy($id)
    {
        Cliente::findOrFail($id)->delete();
        return redirect()->route('admin.clientes.index')->with('success', 'Cliente eliminado.');
    }

    public function booksIndex()
    {
        $books = Bookfoto::with('cliente')->get();
        return view('admin.books.index', compact('books'));
    }

    public function booksCreate()
    {
        $clientes = Cliente::all();
        return view('admin.books.create', compact('clientes'));
    }

    public function booksStore(Request $request)
    {
        $request->validate([
            'nombrebook' => 'required|max:80',
            'idcliente' => 'required|exists:clientes,idcliente',
            'pwd' => 'required|max:15',
        ]);

        Bookfoto::create($request->all());
        return redirect()->route('admin.books.index')->with('success', 'Book creado correctamente.');
    }

    public function booksEdit($id)
    {
        $book = Bookfoto::findOrFail($id);
        $clientes = Cliente::all();
        return view('admin.books.edit', compact('book', 'clientes'));
    }

    public function booksUpdate(Request $request, $id)
    {
        $request->validate([
            'nombrebook' => 'required|max:80',
            'idcliente' => 'required|exists:clientes,idcliente',
            'pwd' => 'nullable|max:15',
        ]);

        $book = Bookfoto::findOrFail($id);
        $oldName = $book->nombrebook;

        $data = $request->except('pwd');
        if ($request->filled('pwd')) {
            $data['pwd'] = $request->pwd;
        }

        $book->update($data);

        $newName = $book->nombrebook;
        if ($oldName !== $newName) {
            $oldPath = public_path($oldName);
            $newPath = public_path($newName);
            if (is_dir($oldPath)) {
                rename($oldPath, $newPath);
            }
        }

        return redirect()->route('admin.books.index')->with('success', 'Book actualizado correctamente.');
    }

    public function booksDestroy($id)
    {
        Bookfoto::findOrFail($id)->delete();
        return redirect()->route('admin.books.index')->with('success', 'Book eliminado.');
    }

    public function booksShow($id)
    {
        $book = Bookfoto::with('cliente')->findOrFail($id);
        $uploadedPhotos = [];
        $disk = Storage::disk('public');
        $photoDir = 'books/' . $book->idbookfotos;
        if ($disk->exists($photoDir)) {
            $files = $disk->files($photoDir);
            foreach ($files as $file) {
                $uploadedPhotos[] = [
                    'name' => basename($file),
                    'url' => $disk->url($file),
                    'size' => $disk->size($file),
                    'is_cover' => basename($file) === 'foto_portada.jpg',
                ];
            }
        }

        return view('admin.books.show', compact('book', 'uploadedPhotos'));
    }

    public function booksUploadPhotos(Request $request, $id)
    {
        $book = Bookfoto::findOrFail($id);

        $request->validate([
            'photos' => 'required|array',
            'photos.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        $disk = Storage::disk('public');
        $photoDir = 'books/' . $book->idbookfotos;

        $uploaded = 0;
        foreach ($request->file('photos') as $photo) {
            $filename = $photo->getClientOriginalName();
            $path = $photoDir . '/' . $filename;
            $counter = 1;
            while ($disk->exists($path)) {
                $info = pathinfo($filename);
                $path = $photoDir . '/' . $info['filename'] . '_' . $counter . '.' . ($info['extension'] ?? 'jpg');
                $counter++;
            }
            $disk->putFileAs($photoDir, $photo, basename($path));
            $uploaded++;
        }

        return back()->with('success', "$uploaded foto(s) subidas correctamente.");
    }

    public function booksDeletePhoto(Request $request, $id)
    {
        $book = Bookfoto::findOrFail($id);
        $request->validate(['photo' => 'required|string']);

        $disk = Storage::disk('public');
        $path = 'books/' . $book->idbookfotos . '/' . $request->photo;

        if ($disk->exists($path)) {
            $disk->delete($path);
            return back()->with('success', 'Foto eliminada.');
        }

        return back()->withErrors(['photo' => 'La foto no existe.']);
    }

    public function booksSetCover(Request $request, $id)
    {
        $book = Bookfoto::findOrFail($id);
        $photo = $request->input('photo');
        $source = $request->input('source', 'uploaded');

        if ($source === 'FTP') {
            $src = public_path($book->nombrebook . '/' . $photo);
            $dst = public_path($book->nombrebook . '/foto_portada.jpg');
            if (!file_exists($src)) {
                return back()->withErrors(['photo' => 'La foto no existe.']);
            }
            if (!copy($src, $dst)) {
                return back()->withErrors(['photo' => 'Error al copiar la foto.']);
            }
        } else {
            $disk = Storage::disk('public');
            $photoDir = 'books/' . $book->idbookfotos;
            $src = $photoDir . '/' . $photo;
            $dst = $photoDir . '/foto_portada.jpg';
            if (!$disk->exists($src)) {
                return back()->withErrors(['photo' => 'La foto no existe.']);
            }
            $disk->copy($src, $dst);
        }

        return back()->with('success', 'Portada actualizada.');
    }
}
