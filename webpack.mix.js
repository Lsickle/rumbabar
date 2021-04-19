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

// mix.autoload({ 'jquery': ['window.$', 'window.jQuery'] });

mix.webpackConfig({
	resolve: {
		alias: {
			'jquery': path.join(__dirname, 'node_modules/jquery/src/jquery'),
		}
	}
});

mix.js('resources/js/app.js', 'public/js')
	.js('resources/js/jszip.js', 'public/js')
	.js('resources/js/pdfmake.js', 'public/js')
	.js('resources/js/datatables-bs4.js', 'public/js')
	.js('resources/js/select2.js', 'public/js')
	.js('resources/js/toastr.js', 'public/js')
	.sass('resources/sass/app.scss', 'public/css')
	.sass('resources/sass/fontawesome.scss', 'public/css')
	.sass('resources/sass/datatables.scss', 'public/css')
	.sass('resources/sass/select2.scss', 'public/css')
	.sass('resources/sass/toastr.scss', 'public/css')
	.copy('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/webfonts')
	.copy('node_modules/jquery.easing/jquery.easing.js', 'public/js/jquery.easing.js')
	.copy('node_modules/jquery.easing/jquery.easing.compatibility.js', 'public/js/jquery.easing.compatibility.js')
	.copy('node_modules/jquery.easing/jquery.easing.js', 'public/js/jquery.easing.js')
	.copy('resources/js/scriptspersonalizados.js', 'public/js/scriptspersonalizados.js')
	.copy('resources/css/sb-admin-2.css', 'public/css/sb-admin-2.css')
	.copy('resources/js/sb-admin-2.js', 'public/js/sb-admin-2.js')
	.copy('resources/js/demo/chart-area-demo.js', 'public/js/demo/chart-area-demo.js')
	.copy('resources/js/demo/chart-bar-demo.js', 'public/js/demo/chart-bar-demo.js')
	.copy('resources/js/demo/chart-pie-demo.js', 'public/js/demo/chart-pie-demo.js');
	// .sourceMaps();

if (mix.inProduction()) {
    mix.version();
}
