<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-inagroda-dark dark:text-inagroda-gold leading-tight">
                <i class="fa-solid fa-gauge-high mr-2"></i> Panel de Control
            </h2>
            <div class="flex items-center gap-3">
                <span class="text-sm text-gray-500 dark:text-gray-400">Hola, {{ Auth::user()->name }}</span>
                @if(Auth::user()->is_admin)
                    <span class="bg-inagroda-gold text-inagroda-dark text-xs font-bold px-2 py-1 rounded-full uppercase tracking-wider">Admin</span>
                @endif
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen transition-colors duration-300">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <a href="{{ route('admin.users.index') }}" class="group relative overflow-hidden bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 hover:shadow-xl hover:-translate-y-1 transition duration-300">
    <div class="relative z-10 flex justify-between items-center">
        <div>
            <h3 class="font-bold text-lg text-gray-800 dark:text-white group-hover:text-pink-500 transition">Usuarios</h3>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Ver lista de registros</p>
        </div>
        <div class="bg-pink-50 dark:bg-gray-700 p-3 rounded-xl group-hover:bg-pink-500 transition">
            <i class="fa-solid fa-users-gear text-xl text-pink-500 dark:text-pink-400 group-hover:text-white"></i>
        </div>
    </div>
</a>

<a href="{{ route('admin.services.index') }}" class="group relative overflow-hidden bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 hover:shadow-xl hover:-translate-y-1 transition duration-300">
    <div class="relative z-10 flex justify-between items-center">
        <div>
            <h3 class="font-bold text-lg text-gray-800 dark:text-white group-hover:text-cyan-500 transition">Servicios</h3>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Administrar ofertas</p>
        </div>
        <div class="bg-cyan-50 dark:bg-gray-700 p-3 rounded-xl group-hover:bg-cyan-500 transition">
            <i class="fa-solid fa-briefcase text-xl text-cyan-500 dark:text-cyan-400 group-hover:text-white"></i>
        </div>
    </div>
</a>
                <a href="{{ route('posts.create') }}" class="group relative overflow-hidden bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 hover:shadow-xl hover:-translate-y-1 transition duration-300">
                    <div class="relative z-10 flex justify-between items-center">
                        <div>
                            <h3 class="font-bold text-lg text-gray-800 dark:text-white group-hover:text-inagroda-green dark:group-hover:text-inagroda-gold transition">Nueva Publicación</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Subir noticia o PDF</p>
                        </div>
                        <div class="bg-green-50 dark:bg-gray-700 p-3 rounded-xl group-hover:bg-inagroda-green transition">
                            <i class="fa-solid fa-pen-nib text-xl text-inagroda-green dark:text-inagroda-gold group-hover:text-white"></i>
                        </div>
                    </div>
                </a>

                <a href="{{ route('admin.messages') }}" class="group relative overflow-hidden bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 hover:shadow-xl hover:-translate-y-1 transition duration-300">
                    <div class="relative z-10 flex justify-between items-center">
                        <div>
                            <h3 class="font-bold text-lg text-gray-800 dark:text-white group-hover:text-blue-500 transition">Buzón de Entrada</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Ver contacto de clientes</p>
                        </div>
                        <div class="bg-blue-50 dark:bg-gray-700 p-3 rounded-xl group-hover:bg-blue-500 transition">
                            <i class="fa-solid fa-inbox text-xl text-blue-500 dark:text-blue-400 group-hover:text-white"></i>
                        </div>
                    </div>
                </a>

                <a href="{{ route('home') }}" target="_blank" class="group relative overflow-hidden bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 hover:shadow-xl hover:-translate-y-1 transition duration-300">
                    <div class="relative z-10 flex justify-between items-center">
                        <div>
                            <h3 class="font-bold text-lg text-gray-800 dark:text-white group-hover:text-purple-500 transition">Ver Página Web</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Ir al sitio público</p>
                        </div>
                        <div class="bg-purple-50 dark:bg-gray-700 p-3 rounded-xl group-hover:bg-purple-500 transition">
                            <i class="fa-solid fa-globe text-xl text-purple-500 dark:text-purple-400 group-hover:text-white"></i>
                        </div>
                    </div>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="bg-gradient-to-br from-inagroda-dark to-green-900 rounded-2xl p-6 text-white shadow-lg relative overflow-hidden">
                    <div class="relative z-10">
                        <p class="text-green-200 text-xs font-bold uppercase tracking-wider mb-2">Usuarios Registrados</p>
                        <p class="text-4xl font-extrabold">{{ $stats['users'] }}</p>
                    </div>
                    <i class="fa-solid fa-users absolute -right-6 -bottom-6 text-9xl text-white opacity-10"></i>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-sm border-l-4 border-inagroda-gold dark:border-inagroda-gold">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-400 text-xs font-bold uppercase tracking-wider mb-2">Publicaciones</p>
                            <p class="text-3xl font-bold text-gray-800 dark:text-white">{{ $stats['posts'] }}</p>
                        </div>
                        <div class="p-2 bg-yellow-50 dark:bg-gray-700 rounded-lg">
                            <i class="fa-regular fa-newspaper text-xl text-inagroda-gold"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-sm border-l-4 {{ $stats['unread_messages'] > 0 ? 'border-red-500' : 'border-blue-500' }} transition-colors duration-300">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-400 text-xs font-bold uppercase tracking-wider mb-2">Mensajes Nuevos</p>
                            <div class="flex items-baseline gap-2">
                                <p class="text-3xl font-bold {{ $stats['unread_messages'] > 0 ? 'text-red-500 animate-pulse' : 'text-gray-800 dark:text-white' }}">
                                    {{ $stats['unread_messages'] }}
                                </p>
                                @if($stats['unread_messages'] > 0)
                                    <span class="text-xs text-red-500 font-medium">Pendientes</span>
                                @else
                                    <span class="text-xs text-green-500 font-medium">Al día</span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="relative p-2 {{ $stats['unread_messages'] > 0 ? 'bg-red-50 dark:bg-red-900/30' : 'bg-blue-50 dark:bg-gray-700' }} rounded-lg transition-colors duration-300">
                            <i class="fa-regular fa-envelope text-xl {{ $stats['unread_messages'] > 0 ? 'text-red-500' : 'text-blue-500 dark:text-blue-400' }}"></i>
                            
                            @if($stats['unread_messages'] > 0)
                                <span class="absolute top-0 right-0 -mt-1 -mr-1 flex h-3 w-3">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-3 w-3 bg-red-500"></span>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="bg-inagroda-gold rounded-2xl p-6 shadow-lg flex flex-col justify-center items-center text-center">
                    <p class="text-inagroda-dark text-xs font-bold uppercase tracking-widest opacity-80 mb-1">Hoy</p>
                    <p class="text-inagroda-dark text-xl font-black">{{ now()->format('d M, Y') }}</p>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-2xl border border-gray-100 dark:border-gray-700">
                <div class="px-6 py-5 border-b border-gray-100 dark:border-gray-700 flex justify-between items-center bg-gray-50 dark:bg-gray-800/50">
                    <h3 class="font-bold text-gray-700 dark:text-gray-200 flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-inagroda-green animate-pulse"></span>
                        Actividad Reciente
                    </h3>
                    <a href="{{ route('admin.messages') }}" class="text-xs font-bold text-inagroda-green dark:text-inagroda-gold hover:underline">VER TODO &rarr;</a>
                </div>
                
                <div class="overflow-x-auto">
                    @if($stats['recent_messages']->count() > 0)
                    <table class="w-full text-sm text-left">
                        <thead class="text-xs text-gray-500 dark:text-gray-400 uppercase bg-gray-50 dark:bg-gray-700/50">
                            <tr>
                                <th class="px-6 py-4">Usuario</th>
                                <th class="px-6 py-4">Mensaje</th>
                                <th class="px-6 py-4">Fecha</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                            @foreach($stats['recent_messages'] as $msg)
                                <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 transition duration-150">
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-full bg-inagroda-light dark:bg-gray-600 flex items-center justify-center text-inagroda-green dark:text-inagroda-gold font-bold">
                                                {{ substr($msg->name, 0, 1) }}
                                            </div>
                                            <div>
                                                {{ $msg->name }}
                                                <div class="text-xs text-gray-400">{{ $msg->email }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-gray-600 dark:text-gray-300">
                                        <p class="truncate max-w-xs">{{ $msg->message }}</p>
                                    </td>
                                    <td class="px-6 py-4 text-gray-500 dark:text-gray-400 text-xs">
                                        {{ $msg->created_at->diffForHumans() }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        <div class="p-10 text-center text-gray-400 dark:text-gray-500">
                            <i class="fa-solid fa-mug-hot text-4xl mb-4 opacity-50"></i>
                            <p>Todo tranquilo por aquí. No hay mensajes nuevos.</p>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</x-app-layout>