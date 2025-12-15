@extends('layouts.public')

@section('content')
<div class="bg-white overflow-hidden">
    <div class="relative max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
        
        <div class="hidden lg:block lg:absolute lg:inset-y-0 lg:h-full lg:w-full">
            <div class="relative h-full text-lg max-w-prose mx-auto" aria-hidden="true">
                <svg class="absolute top-12 left-full transform translate-x-32" width="404" height="384" fill="none" viewBox="0 0 404 384">
                    <defs>
                        <pattern id="74b3fd99-0a6f-4271-bef2-e80eeafdf357" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                        </pattern>
                    </defs>
                    <rect width="404" height="384" fill="url(#74b3fd99-0a6f-4271-bef2-e80eeafdf357)" />
                </svg>
            </div>
        </div>

        <div class="relative px-4 sm:px-6 lg:px-8">
            <div class="text-lg max-w-prose mx-auto mb-6">
                <a href="{{ route('blog') }}" class="text-inagroda-green hover:underline mb-4 inline-block">&larr; Volver al blog</a>
                <h1>
                    <span class="block text-base text-center text-inagroda-gold font-semibold tracking-wide uppercase">
                        {{ ucfirst($post->type) }}
                    </span>
                    <span class="mt-2 block text-3xl text-center leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                        {{ $post->title }}
                    </span>
                </h1>
                <div class="mt-4 flex items-center justify-center text-gray-500">
                    <span class="mr-2"><i class="fa-regular fa-calendar"></i> {{ $post->created_at->format('d M, Y') }}</span>
                    <span><i class="fa-solid fa-user"></i> {{ $post->user->name }}</span>
                </div>
            </div>

            <div class="mt-6 prose prose-lg prose-green text-gray-500 mx-auto">
                
                @if($post->type == 'video' && $post->video_url)
                    <div class="aspect-w-16 aspect-h-9 mb-8">
                        <iframe class="w-full h-96 rounded-lg shadow-lg" src="{{ $post->embed_url }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                @elseif($post->image_path)
                <figure>
                        <img class="w-full rounded-lg shadow-lg mb-8" src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}">
                    </figure>
                @endif

                <div class="text-gray-700 space-y-4">
                    {!! nl2br(e($post->content)) !!}
                </div>

                <div class="mt-10 border-t border-gray-200 pt-8 flex flex-col sm:flex-row gap-4 justify-center">
                    
                    @if($post->file_path)
                        <a href="{{ asset('storage/' . $post->file_path) }}" target="_blank" class="flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-inagroda-green hover:bg-inagroda-dark md:text-lg transition shadow-md">
                            <i class="fa-solid fa-file-pdf mr-2"></i> Descargar Documento PDF
                        </a>
                    @endif

                    @if($post->amazon_link)
                        <a href="{{ $post->amazon_link }}" target="_blank" class="flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-gray-900 bg-inagroda-gold hover:bg-yellow-400 md:text-lg transition shadow-md">
                            <i class="fa-brands fa-amazon mr-2"></i> Comprar en Amazon
                        </a>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
@endsection