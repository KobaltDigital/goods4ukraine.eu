//const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    theme: {
        extend: {
            colors: {
                blue: 'rgb(58, 117, 196)',
                yellow: 'rgb(249, 221, 22)',
            },

            fontFamily: {
                sans: ['Roboto'],
                serif: ['Lora'],
            },
            colors: {
                red: colors.red,
                green: colors.green,
                transparent: 'transparent',
                white: '#FFFDFA',
                light: '#FFF9EF',
                accent: '#9CC9D3',
                yellow: '#FED702',
                blue: '#015ABC',
                black: '#013772'
            },
            fontSize: {
                'xs': '.75rem',
                'sm': '.875rem',
                'base': '1rem',
                'lg': '1.25rem',
            },
            spacing: {
                'px': '1px',
                '0': '0',
                '0.5': '0.1rem',
                '1': '0.25rem',
                '2.5': '0.37rem',
                '2': '0.5rem',
                '3': '0.75rem',
                '4': '1rem',
                '5': '1.25rem',
                '6': '1.5rem',
                '7': '1.75rem',
                '8': '2rem',
                '9': '2.25rem',
                '10': '2.5rem',
                '12': '3rem',
                '16': '4rem',
                '20': '5rem',
                '32': '10rem',
                '64': '16rem',
                '128': '32rem',
                'max': 'max-content'
            },
        },
    },
    plugins: [require('@tailwindcss/forms')],
};
