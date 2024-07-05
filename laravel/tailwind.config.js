/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {
            colors: {
                blue1: "#0693B7",
                blue2: "#0EABD3",
            },
        },
    },
    plugins: [
        require("flowbite/plugin"),
        // require('tailwindcss-animate')
    ],
};
