import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import copy from 'rollup-plugin-copy';

export default defineConfig({
    server: {
        host: '0.0.0.0',
        port: 5173,
        hmr: {
            host: 'localhost',
        },
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),

        copy({
            targets: [
                { src: 'node_modules/@glidejs/glide/dist/css/glide.core.min.css', dest: 'public/css' },
                { src: 'node_modules/@glidejs/glide/dist/css/glide.theme.min.css', dest: 'public/css' },
                { src: 'node_modules/@glidejs/glide/dist/glide.min.js', dest: 'public/js' },
            ],
        }),
    ],
});
