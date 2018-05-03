let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/sass/app.scss', 'public/css');

mix.js([
	'resources/assets/js/app.js',
	'node_modules/jquery/dist/jquery.js',
	'node_modules/bootstrap/dist/js/bootstrap.js']
	, 'public/js/all.js')
   .sass('resources/assets/sass/app.scss', 'public/css');

// mix.scripts([
// 	'jquery/dist/jquery.js'
// 	'bootstrap/dist/js/bootstrap.js'
// ], 'public/js/all.js', 'node_modules'
// ); // compila el fichero bootstrap.js y lo guarda en public/js/all.js y empieza a buscar desde la carpeta node_modules

mix.browserSync({
	proxy: 'tfg.test'
});
