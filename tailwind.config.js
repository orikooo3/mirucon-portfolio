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
                "sub-dark-color": "#1C5D80",
                "accent-color": "#33809F",
                "accent-dark-color": "#2C708A",
                "white-color": "#FDFDFD",
                "white-dark-color": "#F2F2F2",
                "black-color": "#333333",
                "gray-color": "#adadad",
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
