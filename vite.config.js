import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/template/js/app.js",
                "resources/template/css/app.css",
            ],
            refresh: true,
        }),
    ],
});
