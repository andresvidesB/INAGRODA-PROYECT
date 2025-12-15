@extends('layouts.public')

@section('content')
<div class="bg-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-base font-semibold text-inagroda-green tracking-wide uppercase">Lo que hacemos</h2>
            <p class="mt-1 text-4xl font-extrabold text-gray-900 sm:text-5xl sm:tracking-tight lg:text-6xl">
                Nuestros Servicios
            </p>
            <p class="max-w-xl mt-5 mx-auto text-xl text-gray-500">
                Soluciones integrales de ingeniería agronómica, investigación y desarrollo para potenciar tu producción agrícola.
            </p>
        </div>

        <div class="mt-12 grid gap-8 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            @forelse($services as $service)
            <div class="flex flex-col rounded-lg shadow-lg overflow-hidden border border-gray-100 hover:shadow-2xl hover:-translate-y-1 transition duration-300">
                
                <div class="flex-shrink-0 relative">
                    @if($service->image_path)
                        <img class="h-56 w-full object-cover" src="{{ asset('storage/' . $service->image_path) }}" alt="{{ $service->title }}">
                    @else
                        <div class="h-56 w-full bg-inagroda-light flex items-center justify-center border-b border-gray-100">
                            <div class="text-center">
                                <i class="fa-solid fa-leaf text-5xl text-inagroda-green opacity-40 mb-2"></i>
                                <p class="text-gray-400 text-sm">INAGRODA</p>
                            </div>
                        </div>
                    @endif
                    <div class="absolute top-0 right-0 bg-inagroda-gold text-inagroda-dark text-xs font-bold px-3 py-1 rounded-bl-lg">
                        Profesional
                    </div>
                </div>

                <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-gray-900">{{ $service->title }}</h3>
                        <p class="mt-3 text-base text-gray-500 line-clamp-4 leading-relaxed">
                            {{ $service->description }}
                        </p>
                    </div>
                    
                    <div class="mt-8 pt-6 border-t border-gray-100">
                        <a href="{{ route('contact', ['service' => $service->title]) }}" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-inagroda-green hover:bg-inagroda-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-inagroda-green transition-all shadow-md">
                            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                <i class="fa-solid fa-hand-pointer text-green-200 group-hover:text-white transition"></i>
                            </span>
                            Solicitar / Cotizar
                        </a>
                    </div>
                </div>
            </div>
            @empty
                <div class="col-span-3 text-center py-12">
                    <div class="inline-block p-4 rounded-full bg-gray-100 mb-4">
                        <i class="fa-solid fa-briefcase text-4xl text-gray-400"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900">Aún no hay servicios publicados</h3>
                    <p class="text-gray-500">Estamos actualizando nuestro catálogo de servicios. Vuelve pronto.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection