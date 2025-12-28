<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-inagroda-gold leading-tight">
            Editar Usuario: {{ $user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">
                
                <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre Completo</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" required class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-900 dark:text-white focus:border-inagroda-green focus:ring-inagroda-green">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Correo Electrónico</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" required class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-900 dark:text-white focus:border-inagroda-green focus:ring-inagroda-green">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Teléfono</label>
                        <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-900 dark:text-white focus:border-inagroda-green focus:ring-inagroda-green">
                    </div>

                    <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Cambiar Contraseña (Opcional)</label>
                        <input type="password" name="password" placeholder="Dejar en blanco para mantener la actual" class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-900 dark:text-white focus:border-inagroda-green focus:ring-inagroda-green">
                    </div>

                    <div class="flex items-center gap-3 p-4 border border-inagroda-gold rounded-lg bg-yellow-50 dark:bg-gray-900">
                        <input type="checkbox" name="is_admin" id="is_admin" value="1" {{ $user->is_admin ? 'checked' : '' }} class="rounded border-gray-300 text-inagroda-green shadow-sm focus:ring-inagroda-green h-5 w-5">
                        <label for="is_admin" class="text-sm font-bold text-gray-800 dark:text-inagroda-gold">
                            Otorgar permisos de Administrador
                        </label>
                    </div>
                    <p class="text-xs text-gray-500 ml-1">Cuidado: Si marcas esto, el usuario tendrá acceso total al panel.</p>

                    <div class="flex justify-end gap-4 mt-4">
                        <a href="{{ route('admin.users.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Cancelar</a>
                        <button type="submit" class="bg-inagroda-green text-white px-6 py-2 rounded hover:bg-inagroda-dark">Actualizar Usuario</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>