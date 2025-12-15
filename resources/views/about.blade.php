@extends('layouts.public')

@section('content')
<div class="relative bg-inagroda-dark py-24 sm:py-32 overflow-hidden">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" alt="Campo Agrícola" class="w-full h-full object-cover opacity-20">
        <div class="absolute inset-0 bg-gradient-to-b from-inagroda-dark/80 to-inagroda-green/90 mix-blend-multiply"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-6 lg:px-8 text-center">
        <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-6xl drop-shadow-md">
            Nuestra Esencia
        </h1>
        <p class="mt-6 text-lg leading-8 text-inagroda-gold max-w-2xl mx-auto font-medium">
            Innovación, sostenibilidad y compromiso con el campo colombiano. Conoce quiénes somos y hacia dónde vamos.
        </p>
    </div>
</div>

<div class="relative py-16 bg-white sm:py-24 isolate">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12">
            
            <div class="group relative bg-white p-8 rounded-2xl shadow-lg border border-gray-100 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 overflow-hidden">
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-inagroda-green/10 rounded-full group-hover:bg-inagroda-green/20 transition"></div>
                <div class="flex items-center gap-4 mb-6">
                    <div class="p-4 bg-inagroda-green text-white rounded-xl shadow-md group-hover:scale-110 transition duration-300">
                        <i class="fa-solid fa-bullseye text-2xl"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 group-hover:text-inagroda-green transition">Misión</h2>
                </div>
                <p class="text-gray-600 leading-relaxed">
                    Desarrollar procesos de producción agrícola sostenibles, liderando la conservación de recursos naturales y brindando asistencia técnica de calidad en la región Caribe, mejorando así el nivel de vida de la comunidad rural.
                </p>
            </div>

            <div class="group relative bg-white p-8 rounded-2xl shadow-lg border border-gray-100 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 overflow-hidden">
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-inagroda-gold/10 rounded-full group-hover:bg-inagroda-gold/20 transition"></div>
                <div class="flex items-center gap-4 mb-6">
                    <div class="p-4 bg-inagroda-gold text-inagroda-dark rounded-xl shadow-md group-hover:scale-110 transition duration-300">
                        <i class="fa-solid fa-eye text-2xl"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 group-hover:text-inagroda-gold transition">Visión</h2>
                </div>
                <p class="text-gray-600 leading-relaxed">
                    Ser la empresa líder en la administración y desarrollo de empresas agrícolas del sector, reconocida por la innovación tecnológica, la seguridad alimentaria y el compromiso con una agricultura sostenible y eficiente.
                </p>
            </div>

        </div>
    </div>
</div>

<div class="bg-gray-50 py-20 sm:py-24">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:text-center mb-16">
            <h2 class="text-base font-semibold leading-7 text-inagroda-gold uppercase tracking-wide">Nuestro Norte</h2>
            <p class="mt-2 text-3xl font-bold tracking-tight text-inagroda-dark sm:text-4xl">
                Objetivos Estratégicos y Comerciales
            </p>
            <p class="mt-6 text-lg leading-8 text-gray-600">
                INAGRODA tiene como objeto integral potenciar el campo a través de múltiples ejes de acción dirigidos a productores y organizaciones a nivel nacional e internacional.
            </p>
        </div>

        <div class="mx-auto mt-8 max-w-2xl sm:mt-10 lg:mt-12 lg:max-w-none">
            <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-10 lg:max-w-none lg:grid-cols-3">
                
                <div class="flex flex-col bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition border-t-4 border-inagroda-green">
                    <dt class="flex items-center gap-x-3 text-base font-bold leading-7 text-gray-900">
                        <i class="fa-solid fa-plant-wilt text-inagroda-green"></i>
                        Procesos Productivos
                    </dt>
                    <dd class="mt-4 flex flex-auto flex-col text-base leading-7 text-gray-600">
                        <p class="flex-auto">Desarrollo de procesos productivos agrícolas eficientes y rentables.</p>
                    </dd>
                </div>

                <div class="flex flex-col bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition border-t-4 border-inagroda-gold">
                    <dt class="flex items-center gap-x-3 text-base font-bold leading-7 text-gray-900">
                        <i class="fa-solid fa-flask text-inagroda-gold"></i>
                        I+D+i
                    </dt>
                    <dd class="mt-4 flex flex-auto flex-col text-base leading-7 text-gray-600">
                        <p class="flex-auto">Investigación aplicada y transferencia de tecnología de vanguardia.</p>
                    </dd>
                </div>

                <div class="flex flex-col bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition border-t-4 border-inagroda-green">
                    <dt class="flex items-center gap-x-3 text-base font-bold leading-7 text-gray-900">
                        <i class="fa-solid fa-people-group text-inagroda-green"></i>
                        Capacitación Rural
                    </dt>
                    <dd class="mt-4 flex flex-auto flex-col text-base leading-7 text-gray-600">
                        <p class="flex-auto">Asistencia técnica especializada y formación para el talento rural.</p>
                    </dd>
                </div>

                <div class="flex flex-col bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition border-t-4 border-inagroda-gold">
                    <dt class="flex items-center gap-x-3 text-base font-bold leading-7 text-gray-900">
                        <i class="fa-solid fa-briefcase text-inagroda-gold"></i>
                        Administración Agrícola
                    </dt>
                    <dd class="mt-4 flex flex-auto flex-col text-base leading-7 text-gray-600">
                        <p class="flex-auto">Gerencia y administración profesional de empresas del sector.</p>
                    </dd>
                </div>

                <div class="flex flex-col bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition border-t-4 border-inagroda-green">
                    <dt class="flex items-center gap-x-3 text-base font-bold leading-7 text-gray-900">
                        <i class="fa-solid fa-shield-heart text-inagroda-green"></i>
                        Seguridad Alimentaria
                    </dt>
                    <dd class="mt-4 flex flex-auto flex-col text-base leading-7 text-gray-600">
                        <p class="flex-auto">Proyectos enfocados en la seguridad alimentaria y sostenibilidad.</p>
                    </dd>
                </div>

                <div class="flex flex-col bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition border-t-4 border-inagroda-gold">
                    <dt class="flex items-center gap-x-3 text-base font-bold leading-7 text-gray-900">
                        <i class="fa-solid fa-earth-americas text-inagroda-gold"></i>
                        Conservación
                    </dt>
                    <dd class="mt-4 flex flex-auto flex-col text-base leading-7 text-gray-600">
                        <p class="flex-auto">Protección y uso responsable de los recursos naturales.</p>
                    </dd>
                </div>

            </dl>
        </div>
    </div>
</div>

<div class="relative bg-inagroda-green py-16">
    <div class="absolute inset-0 overflow-hidden">
        <svg class="absolute left-1/2 top-0 -translate-x-1/2 -translate-y-1/2 transform w-[100rem] h-[100rem] opacity-10 text-white" fill="currentColor" viewBox="0 0 100 100">
            <circle cx="50" cy="50" r="50" />
        </svg>
    </div>
    <div class="relative max-w-7xl mx-auto px-6 lg:px-8 flex flex-col md:flex-row items-center justify-between gap-8">
        <div class="text-center md:text-left">
            <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Transparencia y Legalidad</h2>
            <p class="mt-3 text-lg text-green-100">
                Accede a nuestros estatutos y documentación legal completa.
            </p>
        </div>
        <div class="flex-shrink-0">
            <a href="{{ asset('storage/estatutos.pdf') }}" target="_blank" class="inline-flex items-center rounded-md bg-white px-8 py-4 text-base font-bold text-inagroda-dark shadow-lg hover:bg-inagroda-gold hover:text-white transition-all duration-300 transform hover:scale-105">
                <i class="fa-solid fa-file-pdf mr-2"></i> Descargar Estatutos
            </a>
        </div>
    </div>
</div>
@endsection