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
                "main-color": "#F1F2F4",
                "sub-color": "#3AC5A2",
                "sub-dark-color": "#34B08F",
                "accent-color": "#277386",
                "accent-dark-color": "#226576",
                "white-color": "#FDFDFD",
                "black-color": "#333333",
                "explain-color": "#596B74",
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
