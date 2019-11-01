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
   .js('resources/js/custom/addMenu.js', 'public/js')
   .js('resources/js/custom/addProduct.js', 'public/js')
   .js('resources/js/custom/editCatering.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');


var LiveReloadPlugin = require('webpack-livereload-plugin');

mix.webpackConfig({
   plugins: [
      new LiveReloadPlugin()
   ]
});