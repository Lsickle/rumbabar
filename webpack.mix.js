const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .copy('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/webfonts')
	.copy('resources/js/scriptspersonalizados.js', 'public/js/scriptspersonalizados.js')
	.copy('resources/css/sb-admin-2.css', 'public/css/sb-admin-2.css')
	.copy('resources/js/sb-admin-2.js', 'public/js/sb-admin-2.js')
	.copy('resources/js/demo/chart-area-demo.js', 'public/js/demo/chart-area-demo.js')
	.copy('resources/js/demo/chart-bar-demo.js', 'public/js/demo/chart-bar-demo.js')
	.copy('resources/js/demo/chart-pie-demo.js', 'public/js/demo/chart-pie-demo.js');

if (mix.inProduction()) {
    mix.version();
}
