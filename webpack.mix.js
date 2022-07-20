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

 mix.copyDirectory( './node_modules/@fortawesome/fontawesome-free/webfonts/*', './public/fonts/font-awesome' );

mix.js('resources/js/admin.js', 'public/js')
   .js('resources/js/front.js', 'public/js')
    .sass('resources/sass/admin/style.scss', 'public/css/admin')
    .sass('resources/sass/front/style.scss', 'public/css/fornt')
    .options({
        processCssUrls:false
    });
