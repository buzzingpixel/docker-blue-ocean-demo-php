const colors = require('tailwindcss/colors')

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./src/**/*.html"],
    theme: {
        extend: {
            colors: {
                rose: colors.rose,
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
    ],
}
