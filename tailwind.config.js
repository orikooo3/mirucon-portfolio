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
                "main-color": "#294A62",
                "main-hover-color": "#E2EBF2",
                "white-color": "#FDFDFD",
                "black-color": "#333333",
                "explain-color": "#626D72",
                "bkg-color": "#F1F2F4",
                "alarm-color": "#BE0A2C",
                "alarm-hover-color": "#FDE1E7",
            },
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                Notosansjp: ["Noto Sans JP"],
            },
        },
    },

    plugins: [forms],
};
