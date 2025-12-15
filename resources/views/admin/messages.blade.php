<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-inagroda-gold leading-tight">
            Buzón de Mensajes
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded shadow-sm" role="alert">
                    <p class="font-bold">¡Hecho!</p>
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    @if($messages->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Estado</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Fecha</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Remitente</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Mensaje</th>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Acción</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach($messages as $msg)
                                {{-- LÓGICA DE COLOR: Si no está leído, fondo blanco brillante y negrita. Si está leído, gris y normal --}}
                                <tr class="transition duration-150 {{ $msg->is_read ? 'bg-gray-50 dark:bg-gray-900 opacity-75' : 'bg-white dark:bg-gray-800 border-l-4 border-inagroda-green' }}">
                                    
                                    {{-- Columna Estado (Icono) --}}
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($msg->is_read)
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                                Leído
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 animate-pulse">
                                                Nuevo
                                            </span>
                                        @endif
                                    </td>

                                    {{-- Columna Fecha --}}
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                        {{ $msg->created_at->format('d/m/Y') }}
                                        <div class="text-xs">{{ $msg->created_at->format('h:i A') }}</div>
                                    </td>

                                    {{-- Columna Remitente --}}
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-bold text-gray-900 dark:text-white">{{ $msg->name }}</div>
                                        <div class="text-sm text-gray-500 dark:text-gray-400">{{ $msg->email }}</div>
                                        <div class="text-xs text-inagroda-green">{{ $msg->phone }}</div>
                                    </td>

                                    {{-- Columna Mensaje --}}
                                    <td class="px-6 py-4">
                                        <p class="text-sm text-gray-600 dark:text-gray-300 line-clamp-2 hover:line-clamp-none transition-all cursor-pointer" title="Clic para expandir">
                                            {{ $msg->message }}
                                        </p>
                                    </td>

                                    {{-- Columna Acción (Botón) --}}
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <form action="{{ route('admin.messages.toggle', $msg->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            
                                            <button type="submit" 
                                                class="flex items-center justify-center w-8 h-8 rounded-full transition shadow-sm mx-auto
                                                {{ $msg->is_read 
                                                    ? 'bg-gray-200 text-gray-500 hover:bg-yellow-100 hover:text-yellow-600' 
                                                    : 'bg-inagroda-green text-white hover:bg-green-700' }}"
                                                title="{{ $msg->is_read ? 'Marcar como NO leído' : 'Marcar como Leído' }}">
                                                
                                                @if($msg->is_read)
                                                    <i class="fa-solid fa-envelope-open"></i> {{-- Icono abierto --}}
                                                @else
                                                    <i class="fa-solid fa-check"></i> {{-- Check para marcar --}}
                                                @endif
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $messages->links() }}
                    </div>
                    @else
                        <div class="text-center py-12 text-gray-500 dark:text-gray-400">
                            <i class="fa-regular fa-envelope-open text-4xl mb-3 opacity-50"></i>
                            <p>No tienes mensajes en el buzón.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>