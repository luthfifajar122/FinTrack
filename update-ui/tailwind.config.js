import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Space Grotesk', ...defaultTheme.fontFamily.sans],
                display: ['Space Grotesk', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                cream: '#F6FEF9',
                mint: '#6EE7B7',
                'mint-dark': '#10B981',
                'mint-pale': '#D1FAE5',
                ink: '#111827',
            },
            boxShadow: {
                'brutal-sm': '2px 2px 0 #111827',
                brutal: '4px 4px 0 #111827',
                'brutal-lg': '6px 6px 0 #111827',
            },
        },
    },

    plugins: [forms],
};
