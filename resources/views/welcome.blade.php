@extends('layouts.public')

@section('content')

<div class="relative bg-gray-900 h-[600px]">
    <div class="absolute inset-0">
        <img src="{{ asset('images/hero-bg.webp') }}" class="w-full h-full object-cover opacity-50" alt="Campo de cultivo INAGRODA">
        <div class="absolute inset-0 bg-gradient-to-r from-inagroda-dark/90 to-transparent"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center">
        <div class="max-w-2xl text-white">
            <span class="inline-block py-1 px-3 rounded-full bg-inagroda-gold text-inagroda-dark font-bold text-sm mb-4">
                Líderes en Agronomía
            </span>
            <h1 class="text-5xl md:text-6xl font-extrabold tracking-tight leading-tight mb-6">
                Innovación y Desarrollo <br> <span class="text-inagroda-gold">para el Campo</span>
            </h1>
            <p class="text-xl text-gray-200 mb-8 leading-relaxed">
                Elevamos la productividad agrícola mediante investigación científica, asistencia técnica y proyectos sostenibles de alto impacto.
            </p>
            <div class="flex flex-wrap gap-4">
                <a href="{{ route('contact') }}" class="px-8 py-4 bg-inagroda-gold text-inagroda-dark font-bold rounded-lg hover:bg-white hover:scale-105 transition transform shadow-lg">
                    Contáctanos Ahora
                </a>
                <a href="{{ route('services') }}" class="px-8 py-4 border-2 border-white text-white font-bold rounded-lg hover:bg-white hover:text-inagroda-dark transition">
                    Ver Servicios
                </a>
            </div>
        </div>
    </div>
</div>

<div class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-inagroda-green font-bold tracking-wide uppercase">Nuestras Soluciones</h2>
            <p class="mt-2 text-4xl font-extrabold text-gray-900">Servicios Integrales para el Agro</p>
            <p class="mt-4 text-xl text-gray-500 max-w-2xl mx-auto">Cubrimos todas las etapas del ciclo productivo con tecnología y experiencia.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            @forelse($services as $service)
                <a href="{{ route('services') }}" class="group bg-white rounded-2xl shadow-sm hover:shadow-2xl transition duration-300 overflow-hidden border border-gray-100 flex flex-col h-full transform hover:-translate-y-2">
                    <div class="h-48 overflow-hidden bg-gray-200 relative">
                        @if($service->image_path)
                            <img src="{{ asset('storage/' . $service->image_path) }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-inagroda-green/10 text-inagroda-green">
                                <i class="fa-solid fa-leaf text-5xl"></i>
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-inagroda-green/80 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
                            <span class="text-white font-bold text-lg border-2 border-white px-6 py-2 rounded-full">Ver Detalles</span>
                        </div>
                    </div>
                    <div class="p-8 flex-1 flex flex-col">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-inagroda-green transition">{{ $service->title }}</h3>
                        <p class="text-gray-600 mb-6 flex-1 line-clamp-3">{{ $service->description }}</p>
                        <span class="text-inagroda-green font-bold uppercase text-sm tracking-wider flex items-center gap-2">
                            Leer más <i class="fa-solid fa-arrow-right group-hover:translate-x-2 transition-transform"></i>
                        </span>
                    </div>
                </a>
            @empty
                <div class="col-span-3 text-center py-10">
                    <p class="text-gray-500">Cargando servicios...</p>
                </div>
            @endforelse
        </div>
        
        <div class="mt-12 text-center">
            <a href="{{ route('services') }}" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-inagroda-green bg-green-100 hover:bg-green-200 transition">
                Explorar todo el portafolio
            </a>
        </div>
    </div>
</div>

<div class="py-24 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:grid lg:grid-cols-2 lg:gap-16 items-center">
            <div class="relative mb-12 lg:mb-0">
                <div class="absolute top-0 left-0 -ml-4 -mt-4 w-full h-full bg-inagroda-gold rounded-2xl transform -translate-x-2 -translate-y-2"></div>
                <img class="relative rounded-2xl shadow-xl w-full object-cover" src="{{ asset('images/equipo.jpg') }}" alt="Equipo Inagroda en campo">
            </div>
            
            <div>
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl mb-6">
                    Más que una empresa, <br> somos tus aliados en el campo.
                </h2>
                <p class="text-lg text-gray-600 mb-6">
                    En INAGRODA combinamos la tradición agrícola con las últimas tecnologías. Nuestro equipo de ingenieros y expertos trabaja mano a mano contigo para garantizar la rentabilidad y sostenibilidad de tus cultivos.
                </p>
                
                <ul class="space-y-4 mb-8">
                    <li class="flex items-start">
                        <div class="flex-shrink-0 h-6 w-6 rounded-full bg-inagroda-green flex items-center justify-center text-white mt-1">
                            <i class="fa-solid fa-check text-xs"></i>
                        </div>
                        <p class="ml-4 text-gray-600">Acompañamiento técnico permanente.</p>
                    </li>
                    <li class="flex items-start">
                        <div class="flex-shrink-0 h-6 w-6 rounded-full bg-inagroda-green flex items-center justify-center text-white mt-1">
                            <i class="fa-solid fa-check text-xs"></i>
                        </div>
                        <p class="ml-4 text-gray-600">Investigación aplicada a tu terreno.</p>
                    </li>
                    <li class="flex items-start">
                        <div class="flex-shrink-0 h-6 w-6 rounded-full bg-inagroda-green flex items-center justify-center text-white mt-1">
                            <i class="fa-solid fa-check text-xs"></i>
                        </div>
                        <p class="ml-4 text-gray-600">Compromiso con el medio ambiente.</p>
                    </li>
                </ul>

                <a href="{{ route('about') }}" class="text-inagroda-green font-bold hover:text-inagroda-dark transition flex items-center gap-2">
                    Conoce nuestra historia <i class="fa-solid fa-long-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="py-24 bg-gray-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-end mb-12">
            <div>
                <h2 class="text-inagroda-gold font-bold tracking-wide uppercase">Actualidad</h2>
                <p class="mt-2 text-3xl font-extrabold text-white">Noticias y Novedades</p>
            </div>
            <a href="{{ route('posts.index') }}" class="hidden md:inline-flex items-center px-4 py-2 border border-gray-600 rounded-md text-gray-300 hover:text-white hover:border-white transition">
                Ver todo el blog
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($posts as $post)
                <a href="{{ route('blog.show', $post->slug) }}" class="group block bg-gray-800 rounded-xl overflow-hidden hover:ring-2 hover:ring-inagroda-green transition">
                    <div class="h-48 overflow-hidden relative">
                        @if($post->image_path)
                            <img src="{{ asset('storage/' . $post->image_path) }}" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500 opacity-80 group-hover:opacity-100">
                        @else
                            <div class="w-full h-full bg-gray-700 flex items-center justify-center">
                                <i class="fa-solid fa-newspaper text-4xl text-gray-500"></i>
                            </div>
                        @endif
                        
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 bg-inagroda-green text-white text-xs font-bold uppercase rounded shadow">
                                {{ $post->type == 'news' ? 'Noticia' : 'Artículo' }}
                            </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="text-sm text-gray-400 mb-2">{{ $post->created_at->format('d M, Y') }}</div>
                        <h3 class="text-xl font-bold text-white mb-3 group-hover:text-inagroda-gold transition line-clamp-2">
                            {{ $post->title }}
                        </h3>
                        <p class="text-gray-400 text-sm line-clamp-3 mb-4">
                            {{ Str::limit(strip_tags($post->content), 100) }}
                        </p>
                        <span class="text-inagroda-gold text-sm font-bold flex items-center gap-2 group-hover:gap-3 transition-all">
                            Leer artículo <i class="fa-solid fa-arrow-right"></i>
                        </span>
                    </div>
                </a>
            @empty
                <div class="col-span-3 text-center text-gray-500">
                    <p>Pronto publicaremos novedades.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-8 text-center md:hidden">
            <a href="{{ route('posts.index') }}" class="text-inagroda-gold font-bold">Ver todo el blog &rarr;</a>
        </div>
    </div>
</div>

<div class="bg-inagroda-green py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-extrabold text-white sm:text-4xl mb-4">
            ¿Listo para transformar tu producción?
        </h2>
        <p class="text-xl text-green-100 mb-8 max-w-2xl mx-auto">
            Agenda una visita técnica o solicita una cotización hoy mismo.
        </p>
        <a href="{{ route('contact') }}" class="inline-block bg-white text-inagroda-green font-bold text-lg px-8 py-4 rounded-lg shadow-lg hover:bg-gray-100 hover:shadow-xl transition transform hover:-translate-y-1">
            Hablar con un Experto
        </a>
    </div>
</div>

@endsection