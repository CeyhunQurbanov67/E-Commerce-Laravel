import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    server: {
        host: "ecommerce.test",
        port:5173,
        strictPort: true,
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css',
                'resources/js/app.js',
                'resources/js/admin-app.js',
                'resources/sass/admin.scss',
                'resources/sass/login.scss'
            ],
            refresh: true,
        }),
    ],
});
