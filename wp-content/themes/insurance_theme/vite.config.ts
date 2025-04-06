import { resolve } from "path";
import { defineConfig } from "vite";
import tailwindcss from "@tailwindcss/vite";

const ROOT = resolve("../../../");

const BASE = __dirname.replace(ROOT, "");

export default defineConfig({
  // TODO: Resolve dev domain issue
  base: "insurance/" + BASE + "/dist/",
  build: {
    manifest: true,
    assetsDir: ".",
    outDir: "dist",
    emptyOutDir: true,
    sourcemap: true,
    rollupOptions: {
      input: {
        "main-scripts": resolve(__dirname, "src/main.ts"),
        "main-styles": resolve(__dirname, "src/css/style.css"),
      },
      output: {
        entryFileNames: `[hash].js`,
        chunkFileNames: `[hash].js`,
        assetFileNames: `[hash].[ext]`,
      },
    },
  },
  plugins: [
    tailwindcss(),
    {
      name: "php",
      handleHotUpdate({ file, server }) {
        if (
          file.endsWith(".php") ||
          file.endsWith(".ts") ||
          file.endsWith(".css")
        ) {
          server.ws.send({ type: "full-reload" });
        }
      },
    },
  ],
});
