<nav x-data="{ 
    open: false,
    darkMode: localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches),
    toggleTheme() {
        this.darkMode = !this.darkMode;
        if (this.darkMode) {
            document.documentElement.classList.add('dark');
            localStorage.setItem('theme', 'dark');
        } else {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('theme', 'light');
        }
    }
}" 
x-init="$watch('darkMode', val => val ? document.documentElement.classList.add('dark') : document.documentElement.classList.remove('dark')); if(darkMode) document.documentElement.classList.add('dark');"
class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 transition-colors duration-300">
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ Auth::user()->is_admin ? route('dashboard') : route('user.dashboard') }}">
                        <span class="text-xl font-bold text-inagroda-green dark:text-inagroda-gold tracking-tighter flex items-center gap-2">
                            <i class="fa-solid fa-leaf"></i> INAGRODA
                        </span>
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    @if(Auth::user()->is_admin)
                        {{-- MENÚ ADMIN --}}
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            <i class="fa-solid fa-gauge mr-2"></i> {{ __('Panel') }}
                        </x-nav-link>
                        
                        <x-nav-link :href="route('admin.posts.index')" :active="request()->routeIs('admin.posts.*')">
    <i class="fa-solid fa-newspaper mr-2"></i> {{ __('Publicaciones') }}
</x-nav-link>

                        <x-nav-link :href="route('admin.messages')" :active="request()->routeIs('admin.messages')">
                            <i class="fa-solid fa-inbox mr-2"></i> {{ __('Mensajes') }}
                        </x-nav-link>

                        <x-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')">
                            <i class="fa-solid fa-users mr-2"></i> {{ __('Usuarios') }}
                        </x-nav-link>

                        <x-nav-link :href="route('admin.services.index')" :active="request()->routeIs('admin.services.*')">
                            <i class="fa-solid fa-briefcase mr-2"></i> {{ __('Servicios') }}
                        </x-nav-link>
                    @else
                        {{-- MENÚ CLIENTE --}}
                        <x-nav-link :href="route('user.dashboard')" :active="request()->routeIs('user.dashboard')">
                            <i class="fa-solid fa-user-circle mr-2"></i> {{ __('Mi Cuenta') }}
                        </x-nav-link>
                        <x-nav-link :href="route('home')" :active="false">
                            <i class="fa-solid fa-globe mr-2"></i> {{ __('Ver Página Web') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                
                <button 
                    @click="toggleTheme()"
                    class="mr-4 p-2 rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-500 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-600 focus:outline-none transition shadow-sm flex items-center justify-center w-10 h-10"
                    title="Cambiar Tema"
                >
                    <i x-show="darkMode" class="fa-solid fa-sun text-yellow-400 text-lg"></i>
                    <i x-show="!darkMode" class="fa-solid fa-moon text-blue-600 text-lg"></i>
                </button>

                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Perfil') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Cerrar Sesión') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @if(Auth::user()->is_admin)
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Panel Admin') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.posts.index')" :active="request()->routeIs('admin.posts.*')">
    <i class="fa-solid fa-newspaper mr-2"></i> {{ __('Publicaciones') }}
</x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.messages')" :active="request()->routeIs('admin.messages')">
                    {{ __('Mensajes') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')">
                    {{ __('Usuarios') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.services.index')" :active="request()->routeIs('admin.services.*')">
                    {{ __('Servicios') }}
                </x-responsive-nav-link>
            @else
                <x-responsive-nav-link :href="route('user.dashboard')" :active="request()->routeIs('user.dashboard')">
                    {{ __('Mi Cuenta') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('home')" :active="false">
                    {{ __('Ver Web') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4 mb-3 flex items-center justify-between">
                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Apariencia</span>
                <button 
                    @click="toggleTheme()"
                    class="p-2 rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-500 dark:text-gray-400 flex items-center gap-2"
                >
                    <span x-text="darkMode ? 'Modo Oscuro' : 'Modo Claro'" class="text-xs"></span>
                    <i x-show="darkMode" class="fa-solid fa-sun text-yellow-400"></i>
                    <i x-show="!darkMode" class="fa-solid fa-moon text-blue-600"></i>
                </button>
            </div>

            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Perfil') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Cerrar Sesión') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>