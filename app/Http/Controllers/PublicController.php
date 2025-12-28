<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    // Página de Inicio
   // app/Http/Controllers/PublicController.php

public function index()
{
    // Traer 3 servicios para la muestra
    $services = \App\Models\Service::take(3)->get();
    
    // Traer 3 noticias recientes
    $posts = \App\Models\Post::latest()->take(3)->get();

    return view('welcome', compact('services', 'posts'));
}

    // Página Nosotros (Misión, Visión, Estatutos)
    public function about()
    {
        return view('about');
    }

    // Blog / Noticias / Videos
    public function blog()
    {
        $posts = Post::where('is_published', true)
                     ->orderBy('created_at', 'desc')
                     ->paginate(9); // 9 posts por página
        return view('blog.index', compact('posts'));
    }

    // Ver una noticia individual
    public function showPost($slug)
    {
        $post = Post::where('slug', $slug)->where('is_published', true)->firstOrFail();
        return view('blog.show', compact('post'));
    }

    // Página de Contacto
    public function contact(Request $request)
    {
        // Verificamos si vienen de la página de servicios con un servicio seleccionado
        $serviceName = $request->query('service'); 
        
        return view('contact', compact('serviceName'));
    }

    // Enviar mensaje de contacto
    public function sendMessage(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string',
        ]);

        ContactMessage::create($validated);

        return back()->with('success', '¡Gracias! Tu mensaje ha sido enviado. Nos pondremos en contacto pronto.');
    }
    // Página pública de Servicios
    public function services()
    {
        $services = \App\Models\Service::all();
        return view('services.index', compact('services'));
    }
}