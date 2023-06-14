const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            gridTemplateColumns: {
                // Simple 12 column grid
                '12': 'repeat(12, minmax(0, 1fr))',
            },
        },
    },

    plugins: [
        require('@tailwindcss/forms'), 
        require('flowbite/plugin'), 
        require('@tailwindcss/typography'),
        require('tailwind-scrollbar')
    ],
};
