import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import copy from 'rollup-plugin-copy';

export default defineConfig({
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
                // Copia los archivos necesarios de Glide.js desde node_modules a tu carpeta pública
                { src: 'node_modules/@glidejs/glide/dist/css/glide.core.min.css', dest: 'public/css' },
                { src: 'node_modules/@glidejs/glide/dist/css/glide.theme.min.css', dest: 'public/css' },
                { src: 'node_modules/@glidejs/glide/dist/glide.min.js', dest: 'public/js' },
            ],
        }),
    ],
});
