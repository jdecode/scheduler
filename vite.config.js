import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    "server": {
        "host": "23.214.1.6",
        "watch": {
            "ignored": [
                "!**/vendor/**"
            ]
        },
        "port": 3000
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
