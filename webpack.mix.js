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
    .js('resources/js/intern.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/intern.scss', 'public/css')
    .version();

mix.styles([
    'node_modules/react-icofont/src/icofont/icofont.min.css',
], 'public/css/all.css');

mix.scripts([
    'resources/js/scripts/dark-light.js',
], 'public/js/all.js');

mix.copyDirectory('node_modules/react-icofont/src/icofont/fonts', 'public/css/fonts');
