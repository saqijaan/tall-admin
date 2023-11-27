import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/admin/app.css',
                'resources/js/admin/app.js',

                'resources/css/web/app.css',
                'resources/js/web/app.js',
            ],
            refresh: true,
        }),
    ],

    resolve: {
        alias: {
            '@': path.resolve(__dirname, './'),
            '@vendor': path.resolve(__dirname, './vendor'),
        },
    },

    build: {
        chunkSizeWarningLimit: 2000
    }
});
