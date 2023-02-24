const defaultTheme = require('tailwindcss/defaultTheme');
//const colors = require('tailwindcss/colors')

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Roboto Condensed', ...defaultTheme.fontFamily.sans],
               /*  sans: ['Nunito', ...defaultTheme.fontFamily.sans], */
            },
            /* opacity: ['responsive','hover','focus','disabled','dark'],
            width: ["responsive", "hover", "focus"],
            height: ["responsive", "hover", "focus"],
            borderWidth: ["responsive", "hover", "focus"],
            display: ["hover"], */
        },
    },

    plugins: [require('@tailwindcss/forms'),require('@tailwindcss/typography')],
};
