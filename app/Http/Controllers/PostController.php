<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    // ==========================================
    // PARTE PÚBLICA (Cualquiera puede ver esto)
    // ==========================================

    /**
     * Muestra la lista de noticias (Blog).
     */
    public function index()
    {
        // Traemos las noticias ordenadas por la más reciente, paginadas de 9 en 9
        $posts = Post::latest()->paginate(9);
        return view('blog.index', compact('posts'));
    }

    /**
     * Muestra una noticia individual.
     */
    public function show($slug)
    {
        // Buscamos por 'slug' (ej: titulo-de-la-noticia) en lugar de ID para que sea amigable
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('blog.show', compact('post'));
    }

    // ==========================================
    // PARTE PRIVADA (Solo Admin)
    // ==========================================

    /**
     * Muestra el formulario para crear una nueva noticia.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Guarda la nueva noticia en la base de datos.
     */
    public function store(Request $request)
    {
        // 1. Validar (Esto ya maneja sus propios errores automáticos)
        $request->validate([
            'title'   => 'required|max:255',
            'content' => 'required',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'type'    => 'required|in:news,video,tip',
        ]);

        // 2. Intentar ejecutar el código peligroso
        try {
            $data = $request->all();
            $data['user_id'] = auth()->id();
            $data['slug'] = Str::slug($request->title) . '-' . time();

            // Subidas de archivos
            if ($request->hasFile('image')) {
                $data['image_path'] = $request->file('image')->store('posts', 'public');
            }

            if ($request->hasFile('file')) {
                $data['file_path'] = $request->file('file')->store('files', 'public');
            }

            if ($request->video_url) {
                $data['embed_url'] = str_replace("watch?v=", "embed/", $request->video_url);
            }

            // Guardar en BD
            Post::create($data);

            // ÉXITO: Redirigir con mensaje verde
            return redirect()->route('admin.posts.index')->with('success', 'Publicación creada con éxito.');

        } catch (\Exception $e) {
            // ERROR: Si algo falla arriba, cae aquí.
            
            // Opcional: Borrar la imagen si se subió pero falló la BD (Limpieza)
            // Log::error($e->getMessage()); // Guardar el error técnico en un archivo oculto

            // Redirigir atrás con mensaje ROJO y manteniendo lo que el usuario escribió
            return back()->withInput()->with('error', 'Ocurrió un error al guardar: ' . $e->getMessage());
        }
    }
    public function adminIndex()
    {
        // Traemos las noticias para la tabla de administración
        $posts = Post::latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Muestra el formulario para editar una noticia existente.
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Actualiza la noticia en la base de datos.
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $request->validate([
            'title'   => 'required|max:255',
            'content' => 'required',
            'image'   => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        // Actualizar Slug solo si el título cambió (opcional, aquí lo forzamos para mantener coherencia)
        $data['slug'] = Str::slug($request->title);

        // Actualizar Imagen (Borrar la anterior si suben una nueva)
        if ($request->hasFile('image')) {
            // Borrar vieja
            if ($post->image_path) {
                Storage::disk('public')->delete($post->image_path);
            }
            // Subir nueva
            $data['image_path'] = $request->file('image')->store('posts', 'public');
        }

        // Actualizar Archivo
        if ($request->hasFile('file')) {
            if ($post->file_path) {
                Storage::disk('public')->delete($post->file_path);
            }
            $data['file_path'] = $request->file('file')->store('files', 'public');
        }

        $post->update($data);

        return redirect()->route('posts.index')->with('success', 'Publicación actualizada correctamente.');
    }

    /**
     * Elimina una noticia.
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        // Borrar imagen asociada para no llenar el servidor de basura
        if ($post->image_path) {
            Storage::disk('public')->delete($post->image_path);
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Publicación eliminada.');
    }
}