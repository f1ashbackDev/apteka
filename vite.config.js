import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css',
                'resources/css/style.css',
                'resources/js/app.js',
                'resources/css/admin/bootstrap.css',
                'resources/css/admin/icons.css',
                'resources/css/admin/theme.css',
                'resources/css/authStyle.css',],
            refresh: true,
        }),
    ],
});
