import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'

// https://vite.dev/config/
export default defineConfig({
  plugins: [vue()],
  root: "./resources/js",
  build: {
    outDir: '../public/dist',
    emptyOutDir: true,
    manifest: true,
    rollupOptions: {
      input: {
        main: './resources/js/main.js',
      },
    },
  },
})
