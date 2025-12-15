<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>INAGRODA - Ingeniero Agrónomo David Asprilla S.A.S</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="font-sans text-gray-800 antialiased flex flex-col min-h-screen bg-inagroda-light">

    <nav class="bg-white shadow-md fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                
                <div class="flex">
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('home') }}" class="flex items-center gap-2">
                            <span class="text-2xl font-bold text-inagroda-green">INAGRODA</span>
                            <i class="fa-solid fa-gear text-inagroda-gold text-xl"></i>
                        </a>
                    </div>
                    
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <a href="{{ route('home') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('home') ? 'border-inagroda-green text-inagroda-green' : 'border-transparent text-gray-500 hover:text-inagroda-green hover:border-inagroda-green' }} text-sm font-medium leading-5 transition duration-150 ease-in-out">
                            Inicio
                        </a>
                        <a href="{{ route('about') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('about') ? 'border-inagroda-green text-inagroda-green' : 'border-transparent text-gray-500 hover:text-inagroda-green hover:border-inagroda-green' }} text-sm font-medium leading-5 transition">
                            Nosotros
                        </a>
                        
                        <a href="{{ route('blog') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('blog*') ? 'border-inagroda-green text-inagroda-green' : 'border-transparent text-gray-500 hover:text-inagroda-green hover:border-inagroda-green' }} text-sm font-medium leading-5 transition">
                            Noticias y Consejos
                        </a>
                        <a href="{{ route('services') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('services') ? 'border-inagroda-green text-inagroda-green' : 'border-transparent text-gray-500 hover:text-inagroda-green hover:border-inagroda-green' }} text-sm font-medium leading-5 transition">
    Servicios
</a>
                        <a href="{{ route('contact') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('contact') ? 'border-inagroda-green text-inagroda-green' : 'border-transparent text-gray-500 hover:text-inagroda-green hover:border-inagroda-green' }} text-sm font-medium leading-5 transition">
                            Contacto
                        </a>
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    @auth
                        @if(Auth::user()->is_admin)
                            <a href="{{ route('dashboard') }}" class="text-sm font-bold text-inagroda-green border border-inagroda-green px-3 py-1 rounded hover:bg-inagroda-green hover:text-white transition">
                                <i class="fa-solid fa-gauge mr-1"></i> Dashboard
                            </a>
                        @else
                            <div class="flex items-center gap-4">
                                <span class="hidden md:inline text-sm text-gray-500">Hola, {{ Auth::user()->name }}</span>
                                
                                <a href="{{ route('user.dashboard') }}" class="text-sm text-gray-600 hover:text-inagroda-green font-medium underline decoration-transparent hover:decoration-inagroda-green transition">
                                    <i class="fa-solid fa-user-circle mr-1"></i> Mi Cuenta
                                </a>

                                <form method="POST" action="{{ route('logout') }}" class="inline">
                                    @csrf
                                    <button type="submit" class="text-sm text-red-500 hover:text-red-700 font-medium ml-2" title="Cerrar Sesión">
                                        <i class="fa-solid fa-right-from-bracket"></i>
                                    </button>
                                </form>
                            </div>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-500 hover:text-inagroda-green transition">
                            <i class="fa-solid fa-right-to-bracket"></i> Ingresar
                        </a>
                        
                        <a href="{{ route('register') }}" class="text-sm bg-inagroda-gold text-inagroda-dark px-3 py-1 rounded font-medium hover:bg-yellow-400 transition shadow-sm">
                            Registrarse
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <div class="h-20"></div>

    <main class="flex-grow">
        @yield('content')
    </main>

    <footer class="bg-inagroda-dark text-white pt-10 pb-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <h3 class="text-lg font-bold text-inagroda-gold mb-4">INAGRODA S.A.S.</h3>
                <p class="text-sm text-gray-300">
                    Desarrollamos procesos de producción agrícolas sostenibles. Innovación y tecnología para el campo.
                </p>
            </div>
            
            <div>
                <h3 class="text-lg font-bold text-inagroda-gold mb-4">Contacto</h3>
                <p class="text-sm text-gray-300"><i class="fa-solid fa-location-dot mr-2"></i> Santa Marta, Magdalena</p>
                <p class="text-sm text-gray-300 mt-2"><i class="fa-solid fa-envelope mr-2"></i> contacto@inagroda.com</p>
            </div>
            
            <div>
                <h3 class="text-lg font-bold text-inagroda-gold mb-4">Síguenos</h3>
                <div class="flex space-x-4">
                    <a href="#" class="text-white hover:text-inagroda-gold transition"><i class="fa-brands fa-facebook fa-lg"></i></a>
                    <a href="#" class="text-white hover:text-inagroda-gold transition"><i class="fa-brands fa-instagram fa-lg"></i></a>
                    <a href="#" class="text-white hover:text-inagroda-gold transition"><i class="fa-brands fa-youtube fa-lg"></i></a>
                    <a href="#" class="text-white hover:text-inagroda-gold transition"><i class="fa-brands fa-whatsapp fa-lg"></i></a>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-10 border-t border-green-800 pt-4 text-xs text-gray-400">
            &copy; {{ date('Y') }} INAGRODA. Todos los derechos reservados.
        </div>
    </footer>
</body>
</html>