@extends('layouts.public')

@section('content')
<div class="bg-white py-16 px-4 overflow-hidden sm:px-6 lg:px-8 lg:py-24">
    <div class="relative max-w-xl mx-auto">
        <div class="text-center">
            <h2 class="text-3xl leading-9 font-extrabold tracking-tight text-gray-900 sm:text-4xl sm:leading-10">
                Contáctanos
            </h2>
            <p class="mt-4 text-lg leading-6 text-gray-500">
                ¿Tienes dudas o quieres cotizar un servicio? Escríbenos.
            </p>
        </div>

        @if(session('success'))
            <div class="mt-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">¡Enviado!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="mt-12">
           <form action="{{ route('contact.send') }}" method="POST" class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
                @csrf
                
                <div class="sm:col-span-2">
                    <label for="name" class="block text-sm font-medium leading-5 text-gray-700">Nombre completo</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input id="name" name="name" type="text" required 
                               value="{{ Auth::check() ? Auth::user()->name : old('name') }}"
                               class="form-input py-3 px-4 block w-full transition ease-in-out duration-150 border-gray-300 rounded-md focus:border-inagroda-green focus:ring-inagroda-green">
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label for="email" class="block text-sm font-medium leading-5 text-gray-700">Correo electrónico</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input id="email" name="email" type="email" required 
                               value="{{ Auth::check() ? Auth::user()->email : old('email') }}"
                               class="form-input py-3 px-4 block w-full transition ease-in-out duration-150 border-gray-300 rounded-md focus:border-inagroda-green focus:ring-inagroda-green">
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label for="phone" class="block text-sm font-medium leading-5 text-gray-700">Teléfono</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input id="phone" name="phone" type="text" 
                               value="{{ Auth::check() ? Auth::user()->phone : old('phone') }}"
                               class="form-input py-3 px-4 block w-full transition ease-in-out duration-150 border-gray-300 rounded-md focus:border-inagroda-green focus:ring-inagroda-green">
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label for="message" class="block text-sm font-medium leading-5 text-gray-700">Mensaje / Solicitud</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <textarea id="message" name="message" rows="4" required class="form-textarea py-3 px-4 block w-full transition ease-in-out duration-150 border-gray-300 rounded-md focus:border-inagroda-green focus:ring-inagroda-green">{{ isset($serviceName) ? 'Hola, estoy interesado en recibir más información y cotización sobre el servicio de: ' . $serviceName . '.' : old('message') }}</textarea>
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <span class="w-full inline-flex rounded-md shadow-sm">
                        <button type="submit" class="w-full inline-flex items-center justify-center px-6 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-inagroda-green hover:bg-inagroda-dark focus:outline-none focus:border-green-700 focus:shadow-outline-green active:bg-green-700 transition ease-in-out duration-150">
                            Enviar Mensaje
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection