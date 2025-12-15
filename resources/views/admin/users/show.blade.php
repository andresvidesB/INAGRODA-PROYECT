<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-inagroda-gold leading-tight">
            Detalles del Usuario: {{ $user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white">Información Personal</h3>
                        <dl class="mt-2 divide-y divide-gray-200 dark:divide-gray-700">
                            <div class="py-3 flex justify-between">
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">ID Usuario</dt>
                                <dd class="text-sm text-gray-900 dark:text-white">{{ $user->id }}</dd>
                            </div>
                            <div class="py-3 flex justify-between">
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Nombre Completo</dt>
                                <dd class="text-sm text-gray-900 dark:text-white">{{ $user->name }}</dd>
                            </div>
                            <div class="py-3 flex justify-between">
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Correo Electrónico</dt>
                                <dd class="text-sm text-gray-900 dark:text-white">{{ $user->email }}</dd>
                            </div>
                             <div class="py-3 flex justify-between">
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Fecha Registro</dt>
                                <dd class="text-sm text-gray-900 dark:text-white">{{ $user->created_at->format('d M Y, h:i A') }}</dd>
                            </div>
                        </dl>
                    </div>
                    </div>
                <div class="mt-6 flex justify-end">
                    <a href="{{ route('admin.users.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Volver</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>