import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            // Shared styles first, then one stylesheet per page
            input: [
                'resources/css/base.css',
                'resources/css/components.css',
                'resources/css/app.css',
                'resources/css/home.css',
                'resources/css/about.css',
                'resources/css/services.css',
                'resources/css/service-detail.css',
            ],
            refresh: true,
        }),
    ],
});
