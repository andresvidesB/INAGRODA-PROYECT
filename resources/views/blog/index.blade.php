@extends('layouts.public')

@section('content')
<div class="bg-gray-50 py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="text-center">
            <h2 class="text-3xl font-extrabold tracking-tight text-inagroda-green sm:text-4xl">
                Centro de Recursos y Noticias
            </h2>
            <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                Mantente actualizado con las últimas novedades del agro, videos de capacitación y bibliografía recomendada.
            </p>
        </div>
        
        <div class="mt-12 max-w-lg mx-auto grid gap-8 lg:grid-cols-3 lg:max-w-none">
            @foreach($posts as $post)
                <div class="flex flex-col rounded-lg shadow-lg overflow-hidden transition hover:-translate-y-1 hover:shadow-2xl duration-300">
                    <div class="flex-shrink-0">
                        @if($post->image_path)
                            <img class="h-48 w-full object-cover" src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}">
                        @else
                            <div class="h-48 w-full bg-inagroda-light flex items-center justify-center">
                                <i class="fa-solid fa-seedling text-4xl text-inagroda-green opacity-50"></i>
                            </div>
                        @endif
                    </div>
                    
                    <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                        <div class="flex-1">
                            <p class="text-sm font-medium text-inagroda-gold">
                                @if($post->type == 'news') <i class="fa-regular fa-newspaper mr-1"></i> Noticia
                                @elseif($post->type == 'video') <i class="fa-brands fa-youtube mr-1"></i> Video
                                @else <i class="fa-solid fa-lightbulb mr-1"></i> Consejo
                                @endif
                            </p>
                            <a href="{{ route('blog.show', $post->slug) }}" class="block mt-2">
                                <p class="text-xl font-semibold text-gray-900 hover:text-inagroda-green transition">
                                    {{ $post->title }}
                                </p>
                                <p class="mt-3 text-base text-gray-500 line-clamp-3">
                                    {{ Str::limit($post->content, 100) }}
                                </p>
                            </a>
                        </div>
                        <div class="mt-6 flex items-center">
                            <div class="flex-shrink-0">
                                <span class="sr-only">{{ $post->user->name }}</span>
                                <div class="h-10 w-10 rounded-full bg-inagroda-dark flex items-center justify-center text-white font-bold">
                                    {{ substr($post->user->name, 0, 1) }}
                                </div>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">
                                    {{ $post->user->name }}
                                </p>
                                <div class="flex space-x-1 text-sm text-gray-500">
                                    <time datetime="{{ $post->created_at }}">{{ $post->created_at->format('d M, Y') }}</time>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-10">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection