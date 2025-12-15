<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-inagroda-gold">Mis Servicios</h2>
            <a href="{{ route('admin.services.create') }}" class="bg-inagroda-green text-white px-4 py-2 rounded text-sm hover:bg-green-700">+ Crear Nuevo</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($services as $service)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg relative group">
                    @if($service->image_path)
                        <img src="{{ asset('storage/' . $service->image_path) }}" class="w-full h-40 object-cover">
                    @else
                        <div class="w-full h-40 bg-gray-200 flex items-center justify-center text-gray-400">Sin Imagen</div>
                    @endif
                    <div class="p-4">
                        <h3 class="font-bold text-gray-800 dark:text-white">{{ $service->title }}</h3>
                        <p class="text-sm text-gray-500 mt-2 line-clamp-2">{{ $service->description }}</p>
                    </div>
                    <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition" onsubmit="return confirm('¿Seguro que deseas eliminar este servicio?');">
                        @csrf @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white p-2 rounded-full hover:bg-red-700 shadow"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </div>
                @endforeach
            </div>
            <div class="mt-6">{{ $services->links() }}</div>
        </div>
    </div>
</x-app-layout>