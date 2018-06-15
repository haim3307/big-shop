const mix = require('laravel-mix');
const minifier = require('minifier');

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
mix.setPublicPath('../public_html/big-shop');
const base = '../public_html/big-shop/';
mix.js('resources/assets/js/app.js', 'js/app.js')
	.sass('resources/assets/sass/app.scss', 'css/app.css');


mix.then(() => {
	minifier.minify(base+'js/app.js');
  minifier.minify(base+'css/app.css');
});
/*
mix.styles('public/css/pages/home.css', 'public/css/pages/homePreFixed.css')
	.options({
		postCss: [
			require('autoprefixer')({
				browsers: ['last 40 versions'],
				grid: true
			})
		]
});*/
