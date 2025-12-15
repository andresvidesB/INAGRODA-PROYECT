<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" x-data="{ loading: false }" @submit="loading = true">
        @csrf

        <div>
            <x-input-label for="name" :value="__('Nombre Completo')" />
            <x-text-input id="name" class="block mt-1 w-full focus:border-inagroda-green focus:ring-inagroda-green" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="email" :value="__('Correo Electrónico')" />
            <x-text-input id="email" class="block mt-1 w-full focus:border-inagroda-green focus:ring-inagroda-green" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="phone" :value="__('Teléfono / Celular')" />
            
            <x-text-input 
                id="phone" 
                class="block mt-1 w-full focus:border-inagroda-green focus:ring-inagroda-green" 
                type="tel" 
                name="phone" 
                :value="old('phone')" 
                required 
                placeholder="Ej: 3001234567"
                maxlength="15" 
                pattern="[0-9]*"
                inputmode="numeric"
                oninput="this.value = this.value.replace(/[^0-9]/g, '')" 
            />
            
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            <p class="text-xs text-gray-500 mt-1">Ingresa solo números (Mínimo 10 dígitos).</p>
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />

            <x-text-input id="password" class="block mt-1 w-full focus:border-inagroda-green focus:ring-inagroda-green"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full focus:border-inagroda-green focus:ring-inagroda-green"
                            type="password"
                            name="password_confirmation"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-inagroda-green" href="{{ route('login') }}">
                {{ __('¿Ya estás registrado?') }}
            </a>

            <button type="submit" 
                    :disabled="loading" 
                    :class="{ 'opacity-50 cursor-not-allowed': loading }"
                    class="ml-4 inline-flex items-center px-4 py-2 bg-inagroda-green border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-inagroda-dark focus:bg-inagroda-dark active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                
                <span x-show="!loading">{{ __('Registrarse') }}</span>
                
                <span x-show="loading" class="flex items-center" style="display: none;">
                    <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Procesando...
                </span>
            </button>
        </div>
    </form>
</x-guest-layout>