@extends('layouts.public')

@section('content')

<div class="fixed top-0 left-0 h-1 bg-inagroda-gold z-50 w-0 transition-all duration-300" id="readingProgress"></div>

<article class="bg-white min-h-screen">
    
    <header class="relative bg-inagroda-dark py-16 sm:py-24">
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 30px 30px;"></div>
        
        <div class="relative max-w-3xl mx-auto px-6 flex flex-col items-start justify-end h-full">
            <a href="{{ route('posts.index') }}" class="mb-8 text-inagroda-gold hover:text-white flex items-center gap-2 transition group font-medium">
    <i class="fa-solid fa-arrow-left group-hover:-translate-x-1 transition-transform"></i>
    Volver a Noticias
</a>

            <div class="mb-6">
                <span class="px-4 py-1.5 rounded-full text-sm font-bold uppercase tracking-wider shadow-sm
                    {{ $post->type == 'video' ? 'bg-red-500 text-white' : ($post->type == 'tip' ? 'bg-inagroda-gold text-inagroda-dark' : 'bg-inagroda-green text-white') }}">
                    {{ $post->type == 'news' ? 'Noticia' : ($post->type == 'tip' ? 'Consejo Técnico' : 'Video') }}
                </span>
            </div>

            <h1 class="text-3xl md:text-5xl font-extrabold text-white leading-tight mb-6">
                {{ $post->title }}
            </h1>

            <div class="flex items-center gap-6 text-gray-300 text-sm md:text-base border-t border-gray-700 pt-6 w-full">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-inagroda-gold flex items-center justify-center text-inagroda-dark font-bold text-lg shadow-inner">
                        I
                    </div>
                    <div>
                        <p class="text-white font-semibold leading-none">INAGRODA</p>
                        <p class="text-xs text-gray-400 mt-1">Equipo Editorial</p>
                    </div>
                </div>
                <div class="h-8 w-px bg-gray-700"></div> <div class="flex items-center gap-2">
                    <i class="fa-regular fa-calendar text-inagroda-gold"></i>
                    <span>{{ $post->created_at->format('d de F, Y') }}</span>
                </div>
            </div>
        </div>
    </header>

    <div class="max-w-3xl mx-auto px-6 -mt-10 pb-20 relative z-10">
        
        @if($post->image_path)
            <div class="mb-10 rounded-2xl overflow-hidden shadow-2xl border-4 border-white">
                <img src="{{ asset('storage/' . $post->image_path) }}" 
                     alt="{{ $post->title }}" 
                     class="w-full h-auto max-h-[450px] object-cover transform hover:scale-105 transition duration-700">
            </div>
        @endif

        @if($post->type == 'video' && $post->video_url)
            <div class="mb-10 rounded-2xl overflow-hidden shadow-xl aspect-w-16 aspect-h-9 bg-black border-4 border-white">
                <iframe class="w-full h-64 md:h-[400px]" src="{{ $post->embed_url }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        @endif

        <div class="prose prose-lg prose-green max-w-none text-gray-700 leading-relaxed">
            {!! nl2br(e($post->content)) !!}
        </div>

        @if($post->file_path || $post->amazon_link)
            <div class="mt-12 space-y-4">
                @if($post->file_path)
                    <div class="p-6 bg-gray-50 border border-gray-200 rounded-xl flex items-center justify-between hover:border-inagroda-green transition group">
                        <div class="flex items-center gap-4">
                            <div class="p-3 bg-red-100 text-red-600 rounded-lg group-hover:scale-110 transition">
                                <i class="fa-solid fa-file-pdf text-2xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900">Documento Adjunto</h4>
                                <p class="text-sm text-gray-500">Recurso complementario para descargar.</p>
                            </div>
                        </div>
                        <a href="{{ asset('storage/' . $post->file_path) }}" target="_blank" class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-inagroda-green hover:text-white transition shadow-sm">
                            Descargar <i class="fa-solid fa-download ml-2"></i>
                        </a>
                    </div>
                @endif
                
                @if($post->amazon_link)
                    <a href="{{ $post->amazon_link }}" target="_blank" class="flex items-center justify-center w-full py-4 bg-[#FF9900] hover:bg-[#ffad33] text-white font-bold rounded-lg shadow-md transition transform hover:-translate-y-1 gap-2">
                        <i class="fa-brands fa-amazon text-xl"></i> 
                        <span>Ver producto recomendado en Amazon</span>
                    </a>
                @endif
            </div>
        @endif

        <div class="mt-16 pt-8 border-t border-gray-200">
            <h3 class="text-center text-gray-900 font-bold mb-6">Compartir este artículo</h3>
            <div class="flex justify-center gap-4">
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" class="w-12 h-12 rounded-full bg-blue-600 text-white hover:bg-blue-700 transition flex items-center justify-center shadow-lg hover:-translate-y-1">
                    <i class="fa-brands fa-facebook-f text-lg"></i>
                </a>
                <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($post->title) }}" target="_blank" class="w-12 h-12 rounded-full bg-sky-500 text-white hover:bg-sky-600 transition flex items-center justify-center shadow-lg hover:-translate-y-1">
                    <i class="fa-brands fa-twitter text-lg"></i>
                </a>
                <a href="https://api.whatsapp.com/send?text={{ urlencode($post->title . ' ' . request()->fullUrl()) }}" target="_blank" class="w-12 h-12 rounded-full bg-green-500 text-white hover:bg-green-600 transition flex items-center justify-center shadow-lg hover:-translate-y-1">
                    <i class="fa-brands fa-whatsapp text-lg"></i>
                </a>
            </div>
        </div>
    </div>
</article>

<script>
    // Barra de progreso simple
    window.onscroll = function() {
        let winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        let height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        let scrolled = (winScroll / height) * 100;
        document.getElementById("readingProgress").style.width = scrolled + "%";
    };
</script>

@endsection