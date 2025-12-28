@extends('layouts.public')

@section('content')
<div class="min-h-[60vh] flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 text-center">
        <div>
            <div class="mx-auto h-24 w-24 bg-green-100 rounded-full flex items-center justify-center">
                <i class="fa-solid fa-seedling text-5xl text-inagroda-green opacity-50"></i>
            </div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                ¡Ups! Página no encontrada
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Parece que la semilla que buscas aún no ha germinado o la página ha sido movida.
            </p>
        </div>
        <div>
            <a href="{{ route('home') }}" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-md text-inagroda-dark bg-inagroda-gold hover:bg-yellow-400 focus:outline-none transition">
                <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                    <i class="fa-solid fa-home text-inagroda-dark group-hover:text-black"></i>
                </span>
                Volver al Inicio
            </a>
        </div>
    </div>
</div>
@endsection