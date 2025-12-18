import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    css: {
        preprocessorOptions: {
            scss: {
                // Mengabaikan peringatan dari Bootstrap/node_modules
                quietDeps: true,
                // Mengabaikan peringatan spesifik tentang fungsi warna
                silenceDeprecations: ['color-functions', 'import', 'global-builtin'],
            },
        },
    },
});