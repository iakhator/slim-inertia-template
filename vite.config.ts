import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'

// https://vite.dev/config/
export default defineConfig({
  plugins: [vue()],
  build: {
    outDir: '../public/dist',
    manifest: true,
    rollupOptions: {
      input: {
        main: './src/main.ts',
      },
    },
  },
  server: {
    strictPort: true,
    origin: 'http://localhost:8080',
    // hmr: {
    //   host: 'localhost'
    // }
  }
})
