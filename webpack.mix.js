const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
    .js('resources/js/app.js', 'public/js')
    .scripts([
        'resources/assets/js/common/script.js',
    ], 'public/js/common.min.js')
    .js('resources/assets/js/layouts/common.js', 'public/js/layouts.min.js')
    //#############################  courses  ##################################
    .js(['resources/assets/js/courses/common.js', 'resources/assets/js/courses/list.js'], 'public/js/courses/list.min.js')
    .js([
        'resources/assets/js/courses/common.js',
        'resources/assets/js/courses/video-player.js',
        'resources/assets/js/courses/show.js'
    ], 'public/js/courses/show.min.js')
    //#############################  shopping cart  ##################################
    .js('resources/assets/js/certificates/list.js', 'public/js/certificates/list.min.js')
    //#############################  shopping cart  ##################################
    .js('resources/assets/js/shopping-cart.js', 'public/js/shopping-cart.min.js')
    //#############################  invoices  ##################################
    .js('resources/assets/js/invoices/list.js', 'public/js/invoices/list.min.js')
    //#############################  Authentication  ##################################
    .js([
        'resources/assets/js/auth/login.js',
    ], 'public/js/auth/login.min.js')
    .js([
        'resources/assets/js/auth/register.js',
    ], 'public/js/auth/register.min.js')
    .js([
        'resources/assets/js/auth/reset-password.js',
    ], 'public/js/auth/reset-password.min.js')
    .js([
        'resources/assets/js/auth/forget-password.js',
    ], 'public/js/auth/forget-password.min.js')
    .js([
        'resources/assets/js/profile/edit.js',
    ], 'public/js/profile/edit.min.js')

    .copyDirectory(['resources/assets/js/zoom'], 'public/js/zoom')

    //#############################  assets  ##################################
    .styles(['resources/assets/css/'], 'public/css/main.css')
    .copy(['resources/assets/media/'], 'public/media')
    .copy(['resources/assets/webfonts/'], 'public/webfonts')
    .copy(['resources/assets/fonts/'], 'public/fonts')
    .copyDirectory(['resources/assets/css/zoom'], 'public/css/zoom')
    .copy(['resources/css/rtl.css'], 'public/css/rtl.css')
    .copy(['resources/assets/js/vendor'], 'public/js/vendor')
    .copy(['resources/assets/css/vendor'], 'public/css/vendor')


    //#############################  admin assets  ##################################
    .js([
        'resources/admin/assets/js/scripts.js',
    ], 'public/admin/assets/js/scripts.js')
    .js([
        'resources/admin/assets/js/common.js',
    ], 'public/admin/assets/js/common.min.js')
    .js([
        'resources/admin/assets/js/auth/login.js',
    ], 'public/admin/assets/js/auth/login.min.js')

    .scripts([
        'resources/admin/assets/js/owners/common.js',
        'resources/admin/assets/js/owners/create.js',
    ], 'public/admin/assets/js/owners/create.min.js')

    .scripts([
        'resources/admin/assets/js/owners/common.js',
        'resources/admin/assets/js/owners/edit.js',
    ], 'public/admin/assets/js/owners/edit.min.js')

    .scripts([
        'resources/admin/assets/js/owners/show.js',
    ], 'public/admin/assets/js/owners/show.min.js')

    .scripts([
        'resources/admin/assets/js/owners/list.js',
    ], 'public/admin/assets/js/owners/list.min.js')

    .scripts([
        'resources/admin/assets/js/speakers/list.js',
    ], 'public/admin/assets/js/speakers/list.min.js')

    .scripts([
        'resources/admin/assets/js/speakers/common.js',
        'resources/admin/assets/js/speakers/create.js',
    ], 'public/admin/assets/js/speakers/create.min.js')

    .scripts([
        'resources/admin/assets/js/speakers/common.js',
        'resources/admin/assets/js/speakers/edit.js',
    ], 'public/admin/assets/js/speakers/edit.min.js')

    .scripts([
        'resources/admin/assets/js/speakers/show.js',
    ], 'public/admin/assets/js/speakers/show.min.js')
    
    .scripts([
        'resources/admin/assets/js/sponsors/common.js',
        'resources/admin/assets/js/sponsors/create.js',
    ], 'public/admin/assets/js/sponsors/create.min.js')

    .scripts([
        'resources/admin/assets/js/sponsors/common.js',
        'resources/admin/assets/js/sponsors/edit.js',
    ], 'public/admin/assets/js/sponsors/edit.min.js')

    .scripts([
        'resources/admin/assets/js/sponsors/show.js',
    ], 'public/admin/assets/js/sponsors/show.min.js')

    .scripts([
        'resources/admin/assets/js/sponsors/list.js',
    ], 'public/admin/assets/js/sponsors/list.min.js')

    .scripts([
        'resources/admin/assets/js/users/list.js',
    ], 'public/admin/assets/js/users/list.min.js')

    .copyDirectory(['resources/admin/assets/css/'], 'public/admin/assets/css/')
    .copyDirectory(['resources/admin/assets/fonts/'], 'public/admin/assets/fonts/')
    .copyDirectory(['resources/admin/assets/webfonts/'], 'public/admin/assets/webfonts/')
    .copyDirectory(['resources/admin/assets/img/'], 'public/admin/assets/img/')
    .copyDirectory(['resources/admin/assets/js/vendor'], 'public/admin/assets/js/vendor')


    .sourceMaps();
