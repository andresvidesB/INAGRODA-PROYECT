@extends('layouts.public')

@section('content')
<div class="bg-gray-50 min-h-screen py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="bg-white rounded-lg shadow-sm p-6 mb-6 border-l-4 border-inagroda-green flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Hola, {{ Auth::user()->name }}</h1>
                <p class="text-gray-600">Bienvenido a tu área personal en INAGRODA.</p>
            </div>
            <i class="fa-solid fa-user-circle text-4xl text-inagroda-green opacity-20"></i>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <div class="bg-white rounded-lg shadow-sm p-6 hover:shadow-md transition">
                <div class="flex items-center mb-4">
                    <div class="p-3 rounded-full bg-blue-50 text-blue-600 mr-4">
                        <i class="fa-solid fa-id-card text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800">Mis Datos</h3>
                </div>
                <p class="text-gray-500 text-sm mb-4">Actualiza tu nombre, correo o contraseña de acceso.</p>
                <a href="{{ route('profile.edit') }}" class="block w-full text-center py-2 border border-blue-600 text-blue-600 rounded hover:bg-blue-600 hover:text-white transition">
                    Editar Perfil
                </a>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-6 hover:shadow-md transition">
                <div class="flex items-center mb-4">
                    <div class="p-3 rounded-full bg-green-50 text-inagroda-green mr-4">
                        <i class="fa-solid fa-file-arrow-down text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800">Recursos</h3>
                </div>
                <p class="text-gray-500 text-sm mb-4">Accede rápidamente a los estatutos y documentos públicos.</p>
                <a href="{{ route('about') }}" class="block w-full text-center py-2 border border-inagroda-green text-inagroda-green rounded hover:bg-inagroda-green hover:text-white transition">
                    Ver Documentos
                </a>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-6 hover:shadow-md transition">
                <div class="flex items-center mb-4">
                    <div class="p-3 rounded-full bg-yellow-50 text-inagroda-gold mr-4">
                        <i class="fa-solid fa-headset text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800">Ayuda</h3>
                </div>
                <p class="text-gray-500 text-sm mb-4">¿Tienes dudas sobre nuestros servicios?</p>
                <a href="{{ route('contact') }}" class="block w-full text-center py-2 border border-inagroda-gold text-inagroda-dark rounded hover:bg-inagroda-gold transition">
                    Contactar Soporte
                </a>
            </div>

        </div>

        <div class="mt-8 text-center">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-red-500 hover:text-red-700 font-medium underline">
                    Cerrar Sesión de forma segura
                </button>
            </form>
        </div>

    </div>
</div>
@endsection