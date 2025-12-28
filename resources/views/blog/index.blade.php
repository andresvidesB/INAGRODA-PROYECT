@extends('layouts.public')

@section('content')
<div class="relative bg-inagroda-dark py-20 px-6 lg:px-8 mb-12 overflow-hidden">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1625246333195-58f216f186fa?q=80&w=1920&auto=format&fit=crop" class="w-full h-full object-cover opacity-20">
        <div class="absolute inset-0 bg-gradient-to-t from-inagroda-dark via-transparent to-transparent"></div>
    </div>
    <div class="relative max-w-7xl mx-auto text-center">
        <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl">
            Actualidad y Campo
        </h1>
        <p class="mt-4 text-xl text-gray-300 max-w-2xl mx-auto">
            Noticias, consejos técnicos y videos sobre el agro colombiano.
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-24">
    
    <div class="flex flex-wrap justify-center gap-4 mb-12">
        <span class="px-4 py-2 rounded-full bg-inagroda-green text-white text-sm font-bold shadow-md cursor-default">Todo</span>
        <span class="px-4 py-2 rounded-full bg-white text-gray-600 border border-gray-200 text-sm hover:border-inagroda-green hover:text-inagroda-green transition cursor-default">Noticias</span>
        <span class="px-4 py-2 rounded-full bg-white text-gray-600 border border-gray-200 text-sm hover:border-red-500 hover:text-red-500 transition cursor-default">Videos</span>
        <span class="px-4 py-2 rounded-full bg-white text-gray-600 border border-gray-200 text-sm hover:border-inagroda-gold hover:text-inagroda-gold transition cursor-default">Tips Técnicos</span>
    </div>

    @if($posts->count() > 0)
        @php $latestPost = $posts->first(); @endphp
        <div class="mb-16">
            <div class="relative rounded-3xl overflow-hidden shadow-2xl group cursor-pointer">
                <a href="{{ route('blog.show', $latestPost->slug) }}" class="block relative h-96 md:h-[500px]">
                    <div class="absolute inset-0">
                        @if($latestPost->image_path)
                            <img src="{{ asset('storage/' . $latestPost->image_path) }}" class="w-full h-full object-cover transition duration-700 group-hover:scale-105">
                        @else
                            <div class="w-full h-full bg-gray-800 flex items-center justify-center">
                                <i class="fa-solid fa-image text-6xl text-gray-600"></i>
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent"></div>
                    </div>

                    <div class="absolute bottom-0 left-0 p-8 md:p-12 w-full md:w-2/3">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wide mb-4
                            {{ $latestPost->type == 'video' ? 'bg-red-500 text-white' : ($latestPost->type == 'tip' ? 'bg-inagroda-gold text-inagroda-dark' : 'bg-inagroda-green text-white') }}">
                            @if($latestPost->type == 'video') <i class="fa-solid fa-play mr-2"></i> @endif
                            {{ $latestPost->type == 'news' ? 'Noticia' : ($latestPost->type == 'tip' ? 'Consejo' : 'Video') }}
                        </span>
                        
                        <h2 class="text-3xl md:text-5xl font-bold text-white mb-4 leading-tight group-hover:text-inagroda-gold transition">
                            {{ $latestPost->title }}
                        </h2>
                        <p class="text-gray-200 text-lg line-clamp-2 mb-6">
                            {{ Str::limit(strip_tags($latestPost->content), 150) }}
                        </p>
                        
                        <div class="flex items-center text-gray-300 text-sm">
                            <i class="fa-regular fa-calendar mr-2"></i> {{ $latestPost->created_at->format('d M, Y') }}
                            <span class="mx-3">•</span>
                            <span>Leer artículo completo <i class="fa-solid fa-arrow-right ml-1"></i></span>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach($posts->skip(1) as $post)
            <article class="flex flex-col bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition duration-300">
                
                <a href="{{ route('blog.show', $post->slug) }}" class="relative h-56 overflow-hidden group">
                    @if($post->image_path)
                        <img src="{{ asset('storage/' . $post->image_path) }}" class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                    @else
                        <div class="w-full h-full bg-gray-100 flex items-center justify-center">
                            <i class="fa-solid fa-newspaper text-4xl text-gray-300"></i>
                        </div>
                    @endif
                    
                    <div class="absolute top-4 left-4">
                        <span class="px-3 py-1 rounded-lg text-xs font-bold uppercase shadow-sm
                        {{ $post->type == 'video' ? 'bg-red-500 text-white' : ($post->type == 'tip' ? 'bg-inagroda-gold text-inagroda-dark' : 'bg-blue-600 text-white') }}">
                            {{ $post->type == 'news' ? 'Noticia' : ($post->type == 'tip' ? 'Tip' : 'Video') }}
                        </span>
                    </div>
                </a>

                <div class="flex-1 p-6 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center text-xs text-gray-500 mb-3">
                            <i class="fa-regular fa-clock mr-1"></i> {{ $post->created_at->diffForHumans() }}
                        </div>
                        <a href="{{ route('blog.show', $post->slug) }}">
                            <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2 hover:text-inagroda-green transition">
                                {{ $post->title }}
                            </h3>
                        </a>
                        <p class="text-gray-600 text-sm line-clamp-3 mb-4">
                            {{ Str::limit(strip_tags($post->content), 100) }}
                        </p>
                    </div>
                    
                    <a href="{{ route('blog.show', $post->slug) }}" class="inline-flex items-center text-sm font-bold text-inagroda-green hover:text-inagroda-dark uppercase tracking-wide">
                        Leer más <i class="fa-solid fa-arrow-right-long ml-2"></i>
                    </a>
                </div>
            </article>
            @endforeach
        </div>

        <div class="mt-12">
            {{ $posts->links() }}
        </div>

    @else
        <div class="text-center py-20">
            <div class="inline-block p-6 rounded-full bg-gray-50 mb-4">
                <i class="fa-regular fa-newspaper text-4xl text-gray-400"></i>
            </div>
            <h3 class="text-lg font-medium text-gray-900">Aún no hay publicaciones</h3>
            <p class="text-gray-500">Estamos preparando contenido interesante para ti.</p>
        </div>
    @endif
</div>
@endsection