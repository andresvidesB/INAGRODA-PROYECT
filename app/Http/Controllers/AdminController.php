<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\ContactMessage;
use App\Models\User;
use App\Models\Service; // Asegúrate de importar el modelo Service
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    // --- 1. DASHBOARD PRINCIPAL (Estadísticas) ---
    // Le cambiamos el nombre de 'index' a 'dashboard' para no chocar
    public function dashboard()
    {
        $stats = [
            'users' => User::count(),
            'posts' => Post::count(),
            // CAMBIO AQUÍ: Contamos solo los que tienen is_read en false (0)
            'unread_messages' => ContactMessage::where('is_read', false)->count(),
            'recent_messages' => ContactMessage::latest()->take(5)->get()
        ];

        return view('dashboard', compact('stats'));
    }

    // --- 2. GESTIÓN DE PUBLICACIONES (CRUD) ---

    // Listar Publicaciones (Este es el verdadero 'index' del recurso)
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    // Formulario Crear Post
    public function create()
    {
        return view('admin.posts.create');
    }

    // Guardar Post
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'type' => 'required|in:news,tip,video',
            'image' => 'nullable|image|max:2048',
            'file' => 'nullable|mimes:pdf|max:10000',
            'video_url' => 'nullable|url',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts/images', 'public');
        }

        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('posts/files', 'public');
        }

        Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . time(),
            'content' => $request->content,
            'type' => $request->type,
            'image_path' => $imagePath,
            'file_path' => $filePath,
            'video_url' => $request->video_url,
            'amazon_link' => $request->amazon_link,
            'user_id' => auth()->id(),
            'is_published' => true,
        ]);

        return redirect()->route('posts.index')->with('success', 'Publicación creada exitosamente.');
    }

    // Formulario Editar Post
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.edit', compact('post'));
    }

    // Actualizar Post
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'type' => 'required|in:news,tip,video',
            'image' => 'nullable|image|max:2048',
            'file' => 'nullable|mimes:pdf|max:10000',
            'video_url' => 'nullable|url',
        ]);

        if ($request->hasFile('image')) {
            if ($post->image_path) Storage::disk('public')->delete($post->image_path);
            $post->image_path = $request->file('image')->store('posts/images', 'public');
        }

        if ($request->hasFile('file')) {
            if ($post->file_path) Storage::disk('public')->delete($post->file_path);
            $post->file_path = $request->file('file')->store('posts/files', 'public');
        }

        $post->update([
            'title' => $request->title,
            'slug' => ($post->title != $request->title) ? Str::slug($request->title) . '-' . time() : $post->slug,
            'content' => $request->content,
            'type' => $request->type,
            'video_url' => $request->video_url,
            'amazon_link' => $request->amazon_link,
            'image_path' => $post->image_path,
            'file_path' => $post->file_path,
        ]);

        return redirect()->route('posts.index')->with('success', 'Publicación actualizada.');
    }

    // Eliminar Post
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if ($post->image_path) Storage::disk('public')->delete($post->image_path);
        if ($post->file_path) Storage::disk('public')->delete($post->file_path);
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Publicación eliminada.');
    }

    // --- 3. GESTIÓN DE MENSAJES ---
    public function messages()
    {
        $messages = ContactMessage::latest()->paginate(20);
        return view('admin.messages', compact('messages'));
    }

    // --- 4. GESTIÓN DE USUARIOS ---
    public function users()
    {
        $users = User::where('id', '!=', auth()->id())->paginate(20);
        return view('admin.users.index', compact('users'));
    }

    public function showUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    // --- EDICIÓN Y ELIMINACIÓN DE USUARIOS ---

    // 1. Mostrar formulario de edición
    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    // 2. Guardar los cambios del usuario
    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            // Validamos que el email sea único, PERO ignoramos el ID de este usuario
            // para que no de error si deja su mismo correo.
            'email' => 'required|email|unique:users,email,'.$user->id, 
            'phone' => 'nullable|string|max:15',
            'password' => 'nullable|min:8', // Opcional: solo si quiere cambiarla
        ]);

        // Actualizamos datos básicos
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        // Si escribió una contraseña nueva, la encriptamos y guardamos
        if ($request->filled('password')) {
            $user->password = \Illuminate\Support\Facades\Hash::make($request->password);
        }

        // Actualizamos el Rol (Admin o Usuario)
        // Usamos la asignación directa porque sacamos 'is_admin' del $fillable
        $user->is_admin = $request->has('is_admin') ? 1 : 0;

        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'Usuario actualizado correctamente.');
    }

    // 3. Eliminar usuario
    public function destroyUser($id)
    {
        // Seguridad: No permitir que te borres a ti mismo
        if ($id == auth()->id()) {
            return back()->with('error', 'No puedes eliminar tu propia cuenta de administrador.');
        }

        $user = User::findOrFail($id);
        $user->delete();

        return back()->with('success', 'Usuario eliminado del sistema.');
    }

    // --- 5. GESTIÓN DE SERVICIOS ---
    public function services()
    {
        $services = Service::latest()->paginate(10);
        return view('admin.services.index', compact('services'));
    }

    public function createService()
    {
        return view('admin.services.create');
    }

    public function storeService(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('services', 'public');
        }

        Service::create([
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('admin.services.index')->with('success', 'Servicio creado.');
    }

    public function destroyService($id)
    {
        $service = Service::findOrFail($id);
        if ($service->image_path) Storage::disk('public')->delete($service->image_path);
        $service->delete();
        return back()->with('success', 'Servicio eliminado.');
    }
    // --- ACCIÓN: MARCAR COMO LEÍDO/NO LEÍDO ---
    public function toggleReadStatus($id)
    {
        $message = ContactMessage::findOrFail($id);
        
        // Invertimos el valor actual (si es true pasa a false, y viceversa)
        $message->update(['is_read' => !$message->is_read]);

        $status = $message->is_read ? 'leído' : 'no leído';
        return back()->with('success', "Mensaje marcado como $status.");
    }
}