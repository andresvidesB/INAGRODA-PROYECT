<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'INAGRODA') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-gray-900 bg-gray-50">
    
    <nav x-data="{ open: false }" class="bg-white border-b border-gray-100 sticky top-0 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center gap-2 group">
                        <div class="w-10 h-10 bg-inagroda-green text-white rounded-lg flex items-center justify-center text-xl shadow-md group-hover:bg-inagroda-dark transition">
                            <i class="fa-solid fa-leaf"></i>
                        </div>
                        <span class="text-2xl font-bold tracking-tighter text-gray-800 group-hover:text-inagroda-green transition">
                            INAGRODA
                        </span>
                    </a>
                </div>

                <div class="hidden md:flex space-x-8 items-center">
                    <a href="{{ route('home') }}" class="text-sm font-bold uppercase tracking-wide text-gray-600 hover:text-inagroda-green transition">Inicio</a>
                    <a href="{{ route('services') }}" class="text-sm font-bold uppercase tracking-wide text-gray-600 hover:text-inagroda-green transition">Servicios</a>
                    <a href="{{ route('about') }}" class="text-sm font-bold uppercase tracking-wide text-gray-600 hover:text-inagroda-green transition">Nosotros</a>
                    <a href="{{ route('posts.index') }}" class="text-sm font-bold uppercase tracking-wide text-gray-600 hover:text-inagroda-green transition">BLOG Y NOTICIAS</a>
                    
                    @auth
                        <div class="relative ml-3" x-data="{ openDropdown: false }">
                            <div>
                                <button @click="openDropdown = !openDropdown" @click.away="openDropdown = false" class="flex items-center gap-2 text-sm font-bold text-gray-700 hover:text-inagroda-green focus:outline-none transition">
                                    <span>{{ Auth::user()->name }}</span>
                                    <i class="fa-solid fa-chevron-down text-xs"></i>
                                </button>
                            </div>
                            
                            <div x-show="openDropdown" 
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="transform opacity-0 scale-95"
                                 x-transition:enter-end="transform opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-75"
                                 x-transition:leave-start="transform opacity-100 scale-100"
                                 x-transition:leave-end="transform opacity-0 scale-95"
                                 class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 ring-1 ring-black ring-opacity-5 z-50 origin-top-right" 
                                 style="display: none;">
                                
                                <a href="{{ Auth::user()->is_admin ? route('dashboard') : route('user.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fa-solid fa-gauge mr-2 text-gray-400"></i> Mi Panel
                                </a>
                                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fa-solid fa-user mr-2 text-gray-400"></i> Perfil
                                </a>
                                <div class="border-t border-gray-100"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                        <i class="fa-solid fa-right-from-bracket mr-2"></i> Cerrar Sesión
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <div class="flex items-center gap-4 pl-4 border-l border-gray-200">
                            <a href="{{ route('login') }}" class="text-sm font-bold text-gray-600 hover:text-inagroda-green transition">Ingresar</a>
                            <a href="{{ route('register') }}" class="px-4 py-2 rounded-md bg-inagroda-gold text-inagroda-dark font-bold text-sm hover:bg-yellow-400 transition shadow-sm">
                                Registrarse
                            </a>
                        </div>
                    @endauth
                </div>

                <div class="-mr-2 flex items-center md:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none transition">
                        <svg class="h-8 w-8" stroke="currentColor" fill="none" viewBox="0 0 24 24" :class="{'hidden': open, 'inline-flex': ! open }">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg class="h-8 w-8" stroke="currentColor" fill="none" viewBox="0 0 24 24" :class="{'hidden': ! open, 'inline-flex': open }" x-cloak>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden bg-white border-t border-gray-100 absolute w-full left-0 shadow-lg z-40">
            <div class="pt-2 pb-4 space-y-1 px-4">
                <a href="{{ route('home') }}" class="block pl-3 pr-4 py-3 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-inagroda-green">Inicio</a>
                <a href="{{ route('services') }}" class="block pl-3 pr-4 py-3 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-inagroda-green">Servicios</a>
                <a href="{{ route('about') }}" class="block pl-3 pr-4 py-3 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-inagroda-green">Nosotros</a>
                <a href="{{ route('posts.index') }}" class="block pl-3 pr-4 py-3 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-inagroda-green">Noticias</a>

                <div class="border-t border-gray-200 mt-4 pt-4">
                    @auth
                        <div class="flex items-center px-4 mb-3">
                            <div class="flex-shrink-0">
                                <div class="h-10 w-10 rounded-full bg-inagroda-green flex items-center justify-center text-white font-bold">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                            </div>
                            <div class="ml-3">
                                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                            </div>
                        </div>
                        <a href="{{ Auth::user()->is_admin ? route('dashboard') : route('user.dashboard') }}" class="block w-full text-center px-4 py-3 bg-inagroda-green text-white font-bold rounded-lg shadow mb-2">
                            Ir a Mi Panel
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-red-600 hover:bg-gray-50 hover:border-red-300">
                                Cerrar Sesión
                            </button>
                        </form>
                    @else
                        <div class="grid grid-cols-2 gap-4 mt-2">
                            <a href="{{ route('login') }}" class="text-center px-4 py-2 border border-gray-300 rounded-lg text-gray-700 font-bold">Ingresar</a>
                            <a href="{{ route('register') }}" class="text-center px-4 py-2 bg-inagroda-gold text-inagroda-dark rounded-lg font-bold">Registrarse</a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="bg-gray-900 text-white py-12 mt-auto border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-8 text-center md:text-left">
            <div>
                <div class="flex items-center justify-center md:justify-start gap-2 mb-4">
                    <i class="fa-solid fa-leaf text-inagroda-green text-2xl"></i>
                    <span class="text-2xl font-bold tracking-tighter">INAGRODA</span>
                </div>
                <p class="text-gray-400 text-sm">Innovación agrícola y desarrollo sostenible.</p>
            </div>
            <div>
                <h4 class="font-bold text-lg mb-4 text-inagroda-gold">Menú</h4>
                <ul class="space-y-2 text-gray-400 text-sm">
                    <li><a href="{{ route('home') }}" class="hover:text-white transition">Inicio</a></li>
                    <li><a href="{{ route('services') }}" class="hover:text-white transition">Servicios</a></li>
                    <li><a href="{{ route('posts.index') }}" class="hover:text-white transition">Noticias</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-lg mb-4 text-inagroda-gold">Contacto</h4>
                <p class="text-gray-400 text-sm mb-2">+57 301 1501508</p>
                <p class="text-gray-400 text-sm">contacto@inagroda.com</p>
            </div>
        </div>
    </footer>

    <div x-data="{ openLightbox: false, imgSrc: '' }" 
     @open-lightbox.window="openLightbox = true; imgSrc = $event.detail.src" 
     x-show="openLightbox" 
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     class="fixed inset-0 z-50 flex items-center justify-center bg-black/90 p-4" 
     style="display: none;" 
     x-cloak>

    <button @click="openLightbox = false" class="absolute top-4 right-4 text-white text-4xl hover:text-gray-300 focus:outline-none z-50">
        &times;
    </button>

    <div @click.away="openLightbox = false" class="max-w-5xl max-h-full">
        <img :src="imgSrc" class="max-w-full max-h-[90vh] object-contain rounded-lg shadow-2xl">
    </div>
</div>
<a href="https://wa.me/+573011501508?text=Hola👋,%20Gracias%20por%20contactar%20a%20INAGRODA.%20Brindamos%20asistencia%20técnica%20agrícola,%20abonos%20orgánicos%20y%20capacitación%20rural.%20Cuéntanos%20tu%20cultivo%20y%20cómo%20podemos%20ayudarte%20🌱." 
       target="_blank" 
       class="fixed bottom-6 right-6 z-50 bg-[#25D366] text-white w-14 h-14 rounded-full flex items-center justify-center shadow-lg hover:scale-110 hover:shadow-green-500/50 transition duration-300 animate-bounce-slow">
        <i class="fa-brands fa-whatsapp text-3xl"></i>
    </a>

    <div class="fixed left-0 top-1/2 transform -translate-y-1/2 z-40 group">
        <div class="flex items-center transition-transform duration-300 transform -translate-x-[calc(100%-40px)] hover:translate-x-0">
            
            <div class="bg-white border-y border-r border-gray-200 shadow-2xl rounded-r-xl p-3 flex flex-col gap-3">
                
                <a href="https://www.facebook.com/share/1KY4Ekg6gR/" target="_blank" class="w-10 h-10 rounded-lg bg-[#1877F2] text-white flex items-center justify-center hover:scale-110 transition shadow-sm" title="Facebook">
                    <i class="fa-brands fa-facebook-f text-xl"></i>
                </a>

                <a href="https://www.instagram.com/inagroda_s.a.s?igsh=MXd0eHZhZmxzNWs3bQ==" target="_blank" class="w-10 h-10 rounded-lg bg-gradient-to-tr from-yellow-400 via-red-500 to-purple-500 text-white flex items-center justify-center hover:scale-110 transition shadow-sm" title="Instagram">
                    <i class="fa-brands fa-instagram text-xl"></i>
                </a>

                <a href="https://tiktok.com/@TU_PAGINA" target="_blank" class="w-10 h-10 rounded-lg bg-black text-white flex items-center justify-center hover:scale-110 transition shadow-sm" title="TikTok">
                    <i class="fa-brands fa-tiktok text-xl"></i>
                </a>
            </div>

            <div class="bg-inagroda-dark text-white w-10 h-12 rounded-r-md shadow-md flex items-center justify-center cursor-pointer -ml-1 group-hover:opacity-0 transition-opacity duration-200">
                <i class="fa-solid fa-share-nodes"></i>
            </div>

        </div>
    </div>

    <style>
        @keyframes bounce-slow {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }
        .animate-bounce-slow {
            animation: bounce-slow 3s infinite;
        }
    </style>
</body>
</html>