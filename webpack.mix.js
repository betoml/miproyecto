const mix = require('laravel-mix');


// Otras configuraciones opcionales
mix.version(); // Agregar versión al nombre del archivo compilado
mix.sourceMaps(); // Generar mapas de origen para depuraciónnpm run dev

mix.webpackConfig({
    resolve: {
        extensions: ['*', '.wasm', '.mjs', '.js', '.jsx', '.json']
    }
});