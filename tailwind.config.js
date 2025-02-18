import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import typography from "@tailwindcss/typography";
import aspectRatio from "@tailwindcss/aspect-ratio";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            height: {
                screen: "100vh",
            },
            spacing: {
                128: "32rem",
                144: "36rem",
            },
            colors: {
                primary: {
                    DEFAULT: "#6366F1",
                    dark: "#4F46E5",
                },
                secondary: {
                    DEFAULT: "#10B981",
                    dark: "#059669",
                },
                danger: {
                    DEFAULT: "#EF4444",
                    dark: "#DC2626",
                },
            },
            boxShadow: {
                "custom-light": "0 0 10px rgba(0, 0, 0, 0.1)",
                "custom-dark": "0 0 15px rgba(0, 0, 0, 0.3)",
            },
        },
    },
    plugins: [forms, typography, aspectRatio],
};
