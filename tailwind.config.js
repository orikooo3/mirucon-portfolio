import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            colors: {
                "main-color": "#4680A8",
                "main-dark-color": "#3D7193",
                "white-color": "#FDFDFD",
                "black-color": "#333333",
                "explain-color": "#626D72",
                "bkg-color": "#F1F2F4",
                "alarm-color": "#BE0A2C",
                "alarm-dark-color": "#970404",
            },
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                Notosansjp: ["Noto Sans JP"],
            },
        },
    },

    plugins: [forms],
};
