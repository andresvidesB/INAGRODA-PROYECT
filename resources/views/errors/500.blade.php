@extends('layouts.public')

@section('content')
<div class="min-h-[60vh] flex items-center justify-center bg-gray-50 py-12 px-4">
    <div class="text-center">
        <i class="fa-solid fa-triangle-exclamation text-6xl text-red-500 mb-6"></i>
        <h1 class="text-4xl font-bold text-gray-900 mb-4">Algo salió mal</h1>
        <p class="text-gray-600 mb-8">Nuestros ingenieros ya están trabajando en el campo para solucionarlo.</p>
        <a href="{{ route('home') }}" class="text-inagroda-green font-bold hover:underline">Recargar página</a>
    </div>
</div>
@endsection