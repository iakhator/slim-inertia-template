import { defineConfig } from 'vite'
import { resolve } from 'path'
import vue from '@vitejs/plugin-vue'

// https://vite.dev/config/
export default defineConfig({
  plugins: [vue()],
  build: {
    outDir: '../public/dist',
    manifest: true,
    rollupOptions: {
      input: {
        main: '/main.ts',
      },
    },
  },
  server: {
    strictPort: true,
    origin: 'http://localhost:8080',
    // hmr: {
    //   host: 'localhost'
    // }
  },
  resolve: {
    alias: {
      '@': resolve(__dirname, './src'),
    },
  },
  // Configure asset handling
  // publicDir: 'src',
  // base: '/',
})
