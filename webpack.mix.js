const mix = require('laravel-mix');
mix.options({
    processCssUrls: false,
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

mix.sass('resources/assets/adminlte/css/app.scss', 'public/assets/adminlte/css').version();
mix.sass('resources/assets/adminlte/css/siaji.scss', 'public/assets/adminlte/css').version();
mix.js('resources/assets/adminlte/js/app.js', 'public/assets/adminlte/js').version();
mix.scripts([
    'resources/assets/adminlte/js/siaji.js'
], 'public/assets/adminlte/js/siaji.js').version();

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
// mix.sass('resources/assets/adminlte/plugins/fontawesome-free/css/all.scss', 'public/assets/plugins/fontawesome-free/css').version();
mix.styles([
    'resources/assets/adminlte/plugins/fontawesome-free/css/all.css'
], 'public/assets/plugins/fontawesome-free/css/all.css').version();
// jQuery
mix.js('resources/assets/adminlte/plugins/jquery/jquery.js', 'public/assets/plugins/jquery').version();
// Bootstrap
mix.js('resources/assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.js', 'public/assets/plugins/bootstrap/js/').version();
mix.js('resources/assets/adminlte/plugins/bootstrap/js/bootstrap.js', 'public/assets/plugins/bootstrap/js/').version();
// Bootstrap Custom File INput
mix.js('resources/assets/adminlte/plugins/bs-custom-file-input/bs-custom-file-input.js', 'public/assets/plugins/bs-custom-file-input/').version();
// Sweetalert2
mix.sass('resources/assets/adminlte/plugins/sweetalert2/css/sweetalert2.scss', 'public/assets/plugins/sweetalert2/css').version();
mix.sass('resources/assets/adminlte/plugins/sweetalert2/css/bootstrap-4.scss', 'public/assets/plugins/sweetalert2/css').version();
mix.js('resources/assets/adminlte/plugins/sweetalert2/js/sweetalert2.js', 'public/assets/plugins/sweetalert2/js').version();
// FontAwesome Iconpicker
mix.scripts([
    'resources/assets/adminlte/plugins/fontawesome-iconpicker/js/fontawesome-iconpicker.js'
], 'public/assets/plugins/fontawesome-iconpicker/js/fontawesome-iconpicker.js').version();
mix.styles([
    'resources/assets/adminlte/plugins/fontawesome-iconpicker/css/fontawesome-iconpicker.css'
], 'public/assets/plugins/fontawesome-iconpicker/css/fontawesome-iconpicker.css').version();
// Datatables
mix.copy('node_modules/admin-lte/plugins/datatables/jquery.dataTables.js', 'public/assets/plugins/datatables/datatables.js').version();
// Datatables BS4
mix.sass('resources/assets/adminlte/plugins/datatables/bs4/css/datatables.bs4.scss', 'public/assets/plugins/datatables/bs4/css').version();
mix.copy('node_modules/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js', 'public/assets/plugins/datatables/bs4/js/dataTables.bootstrap4.js').version();
// Datatables Responsive
mix.sass('resources/assets/adminlte/plugins/datatables/responsive/css/dataTables.responsive.scss', 'public/assets/plugins/datatables/responsive/css').version();
mix.copy('node_modules/admin-lte/plugins/datatables-responsive/js/dataTables.responsive.js', 'public/assets/plugins/datatables/responsive/js/dataTables.responsive.js').version();
mix.copy('node_modules/admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.js', 'public/assets/plugins/datatables/responsive/js/responsive.bootstrap4.js').version();
// Select2
mix.copy('node_modules/admin-lte/plugins/select2/css/select2.css', 'public/assets/plugins/select2/css/select2.css');
mix.copy('node_modules/admin-lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.css', 'public/assets/plugins/select2/css/select2-bootstrap4.css');
mix.copy('node_modules/admin-lte/plugins/select2/js/select2.js', 'public/assets/plugins/select2/js/select2.js');
// CKEditor
mix.scripts([
    'resources/assets/adminlte/plugins/ckeditor/build/ckeditor.js'
], 'public/assets/plugins/ckeditor/build/ckeditor.js').version();