@extends('layouts.public')

@section('content')
<div class="relative bg-inagroda-green overflow-hidden">
    <div class="max-w-7xl mx-auto">
        <div class="relative z-10 pb-8 bg-inagroda-green sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
            <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-inagroda-green transform translate-x-1/2" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
                <polygon points="50,0 100,0 50,100 0,100" />
            </svg>

            <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                <div class="sm:text-center lg:text-left">
                    <h1 class="text-4xl tracking-tight font-extrabold text-white sm:text-5xl md:text-6xl">
                        <span class="block xl:inline">Agricultura Sostenible</span>
                        <span class="block text-inagroda-gold xl:inline">e Innovación</span>
                    </h1>
                    <p class="mt-3 text-base text-gray-100 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                        INGENIERO AGRONOMO DAVID ASPRILLA S.A.S (INAGRODA). Lideramos procesos de producción, investigación y desarrollo agrícola para mejorar el nivel de vida de la comunidad.
                    </p>
                    <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                        <div class="rounded-md shadow">
                            <a href="{{ route('contact') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-inagroda-dark bg-inagroda-gold hover:bg-yellow-400 md:py-4 md:text-lg md:px-10 transition">
                                Contáctanos
                            </a>
                        </div>
                        <div class="mt-3 sm:mt-0 sm:ml-3">
                            <a href="{{ route('about') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-inagroda-green bg-white hover:bg-gray-100 md:py-4 md:text-lg md:px-10 transition">
                                Conócenos
                            </a>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
        <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="https://images.unsplash.com/photo-1625246333195-78d9c38ad449?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Campo Agrícola">
    </div>
</div>

<div class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:text-center">
            <h2 class="text-base text-inagroda-green font-semibold tracking-wide uppercase">Nuestros Servicios</h2>
            <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                Soluciones Integrales para el Agro
            </p>
        </div>

        <div class="mt-10">
            <dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
                <div class="relative">
                    <dt>
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-inagroda-green text-white">
                            <i class="fa-solid fa-seedling"></i>
                        </div>
                        <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Producción Agrícola</p>
                    </dt>
                    <dd class="mt-2 ml-16 text-base text-gray-500">
                        Procesos de producción en función del consumo fresco, industrial y exportación.
                    </dd>
                </div>
                <div class="relative">
                    <dt>
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-inagroda-green text-white">
                           <i class="fa-solid fa-chalkboard-user"></i>
                        </div>
                        <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Capacitación Rural</p>
                    </dt>
                    <dd class="mt-2 ml-16 text-base text-gray-500">
                        Temas de producción alimentaria sostenible y conservación de recursos naturales.
                    </dd>
                </div>
                <div class="relative">
                    <dt>
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-inagroda-green text-white">
                            <i class="fa-solid fa-flask"></i>
                        </div>
                        <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Investigación y Desarrollo</p>
                    </dt>
                    <dd class="mt-2 ml-16 text-base text-gray-500">
                        Transferencia de tecnología y desarrollo de nuevos métodos agrícolas.
                    </dd>
                </div>
                <div class="relative">
                    <dt>
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-inagroda-green text-white">
                            <i class="fa-solid fa-hand-holding-dollar"></i>
                        </div>
                        <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Administración Agrícola</p>
                    </dt>
                    <dd class="mt-2 ml-16 text-base text-gray-500">
                        Manejo de recursos económicos, materiales y humanos en empresas del sector.
                    </dd>
                </div>
            </dl>
        </div>
    </div>
</div>
@endsection