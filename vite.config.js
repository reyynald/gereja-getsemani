import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        // Mengizinkan Vite untuk diakses melalui jaringan (IP)
        host: true, 
        // Memastikan port konsisten agar mudah diakses
        port: 5173,
        strictPort: true,
        // Penting untuk Laravel: mendefinisikan URL yang akan digunakan oleh @vite di blade
        hmr: {
            host: '192.168.1.8', // <--- GANTI dengan IP laptop Anda
        },
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});