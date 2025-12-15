<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'content', 'type', 
        'image_path', 'file_path', 'video_url', 
        'amazon_link', 'is_published', 'user_id'
    ];

    // Relación: Un post pertenece a un usuario (Admin)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Función para obtener la URL embebida si es YouTube
    // En app/Models/Post.php

    public function getEmbedUrlAttribute()
    {
        $url = $this->video_url;

        if (empty($url)) return null;

        // 1. Si ya es un link de embed, lo retornamos tal cual
        if (str_contains($url, 'youtube.com/embed/')) {
            return $url;
        }

        // 2. Lógica inteligente para extraer el ID del video
        // Soporta: youtube.com/watch?v=ID, youtu.be/ID, youtube.com/v/ID
        $pattern = '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i';
        
        if (preg_match($pattern, $url, $match)) {
            return 'https://www.youtube.com/embed/' . $match[1];
        }

        // 3. Si no detectamos que es YouTube, devolvemos la URL original (por si es Vimeo u otro)
        return $url;
    }
}