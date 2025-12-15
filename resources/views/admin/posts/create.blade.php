<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Nueva Publicación') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <div>
                            <label class="block font-medium text-sm text-gray-700">Título de la Publicación</label>
                            <input type="text" name="title" required class="w-full border-gray-300 focus:border-inagroda-green focus:ring-inagroda-green rounded-md shadow-sm mt-1">
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-gray-700">Tipo</label>
                            <select name="type" class="w-full border-gray-300 focus:border-inagroda-green focus:ring-inagroda-green rounded-md shadow-sm mt-1">
                                <option value="news">Noticia / Artículo</option>
                                <option value="video">Video Recomendado</option>
                                <option value="tip">Consejo Técnico</option>
                            </select>
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-gray-700">Contenido / Descripción</label>
                            <textarea name="content" rows="6" required class="w-full border-gray-300 focus:border-inagroda-green focus:ring-inagroda-green rounded-md shadow-sm mt-1"></textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block font-medium text-sm text-gray-700">Imagen de Portada (Opcional)</label>
                                <input type="file" name="image" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-inagroda-green hover:file:bg-green-100">
                            </div>

                            <div>
                                <label class="block font-medium text-sm text-gray-700">PDF Adjunto (Opcional)</label>
                                <input type="file" name="file" accept=".pdf" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-yellow-50 file:text-inagroda-gold hover:file:bg-yellow-100">
                                <p class="text-xs text-gray-500 mt-1">Ideal para Estatutos, Guías o Investigaciones.</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block font-medium text-sm text-gray-700">Enlace de Video (YouTube/Vimeo)</label>
                                <input type="url" name="video_url" placeholder="https://youtube.com/..." class="w-full border-gray-300 focus:border-inagroda-green focus:ring-inagroda-green rounded-md shadow-sm mt-1">
                            </div>

                            <div>
                                <label class="block font-medium text-sm text-gray-700">Enlace Libro Amazon</label>
                                <input type="url" name="amazon_link" placeholder="https://amazon.com/..." class="w-full border-gray-300 focus:border-inagroda-green focus:ring-inagroda-green rounded-md shadow-sm mt-1">
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="bg-inagroda-green text-white px-6 py-2 rounded-md hover:bg-inagroda-dark transition">
                                Publicar Contenido
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>