const mix = require('laravel-mix');
mix.options({
    processCssUrls: false
});

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

mix.sass('resources/assets/adminlte/css/app.scss', 'public/assets/adminlte/css');
mix.js('resources/assets/adminlte/js/app.js', 'public/assets/adminlte/js');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management (Plugins)
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
// FontAwesome
mix.sass('resources/assets/adminlte/plugins/fontawesome-free/css/all.scss', 'public/assets/plugins/fontawesome-free/css');
// jQuery
mix.js('resources/assets/adminlte/plugins/jquery/jquery.js', 'public/assets/plugins/jquery');
// Bootstrap
mix.js('resources/assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.js', 'public/assets/plugins/bootstrap/js/');