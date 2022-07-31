import { defineConfig } from 'vite'
import react from '@vitejs/plugin-react'

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [react()],
  server: {
    port: parseInt(process.env.FRONTEND_PORT) || 5173
  },
  define: {
    'import.meta.env.API_URL': JSON.stringify(process.env.API_URL)
  }
})
