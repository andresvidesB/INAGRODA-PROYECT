<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-inagroda-gold leading-tight">
            Editar Publicación
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Título</label>
                            <input type="text" name="title" value="{{ old('title', $post->title) }}" required class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-inagroda-green focus:ring-inagroda-green rounded-md shadow-sm mt-1">
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Tipo</label>
                            <select name="type" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-inagroda-green focus:ring-inagroda-green rounded-md shadow-sm mt-1">
                                <option value="news" {{ $post->type == 'news' ? 'selected' : '' }}>Noticia / Artículo</option>
                                <option value="video" {{ $post->type == 'video' ? 'selected' : '' }}>Video Recomendado</option>
                                <option value="tip" {{ $post->type == 'tip' ? 'selected' : '' }}>Consejo Técnico</option>
                            </select>
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Contenido</label>
                            <textarea name="content" rows="6" required class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-inagroda-green focus:ring-inagroda-green rounded-md shadow-sm mt-1">{{ old('content', $post->content) }}</textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Imagen de Portada</label>
                                @if($post->image_path)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $post->image_path) }}" alt="Imagen actual" class="h-20 w-auto rounded border">
                                        <p class="text-xs text-gray-500">Imagen actual</p>
                                    </div>
                                @endif
                                <input type="file" name="image" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-inagroda-green hover:file:bg-green-100">
                                <p class="text-xs text-gray-400 mt-1">Sube una nueva solo si quieres cambiarla.</p>
                            </div>

                            <div>
                                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">PDF Adjunto</label>
                                @if($post->file_path)
                                    <div class="mb-2 text-sm text-inagroda-gold">
                                        <i class="fa-solid fa-file-pdf"></i> Archivo actual cargado
                                    </div>
                                @endif
                                <input type="file" name="file" accept=".pdf" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-yellow-50 file:text-inagroda-gold hover:file:bg-yellow-100">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Link Video</label>
                                <input type="url" name="video_url" value="{{ old('video_url', $post->video_url) }}" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-inagroda-green focus:ring-inagroda-green rounded-md shadow-sm mt-1">
                            </div>

                            <div>
                                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Link Amazon</label>
                                <input type="url" name="amazon_link" value="{{ old('amazon_link', $post->amazon_link) }}" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-inagroda-green focus:ring-inagroda-green rounded-md shadow-sm mt-1">
                            </div>
                        </div>

                        <div class="flex justify-end gap-4">
                            <a href="{{ route('posts.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition">Cancelar</a>
                            <button type="submit" class="bg-inagroda-green text-white px-6 py-2 rounded-md hover:bg-inagroda-dark transition">
                                Actualizar Publicación
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>