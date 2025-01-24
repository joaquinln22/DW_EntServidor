import { defineConfig } from 'vite';
import vue from 'vite-plugin-vue2';

export default defineConfig({
    plugins: [vue()],
    server: {
        port: 3000, // Puedes cambiar el puerto si lo necesitas
    },
});
