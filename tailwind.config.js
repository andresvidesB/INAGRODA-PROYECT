import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // Colores extraídos conceptualmente del logo
                inagroda: {
                    green: '#2E7D32', // Verde hoja fuerte
                    dark: '#1B5E20',  // Verde oscuro para textos/footer
                    gold: '#FBC02D',  // Amarillo/Dorado del engranaje
                    light: '#F1F8E9', // Fondo muy suave verdoso
                }
            }
        },
    },

    plugins: [forms],
};