const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Roboto Condensed'],
                /* sans: ['Nunito', ...defaultTheme.fontFamily.sans], */
            },
        },
    },

    variants: {
        extend: {
            opacity: ['responsive','hover','focus','disabled','dark'],
            width: ["responsive", "hover", "focus"],
            height: ["responsive", "hover", "focus"],
            borderWidth: ["responsive", "hover", "focus"],
            display: ["hover"],
        },
    },
    corePlugins: {
       container: false,
      },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
