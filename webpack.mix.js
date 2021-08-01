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
    .scripts(['resources/assets/js/common/uicreep-minify.js',
              'resources/assets/js/common/script.js',
    ], 'public/js/common.min.js')
    .js('resources/assets/js/courses/common.js','public/js/courses/common.min.js')
    .js('resources/assets/js/courses/list.js','public/js/courses/list.min.js')
    .js([
        'resources/assets/js/auth/common.js',
        'resources/assets/js/auth/login.js',
    ], 'public/js/auth/login.min.js')
    .js([
        'resources/assets/js/auth/common.js',
        'resources/assets/js/auth/register.js',
    ], 'public/js/auth/register.min.js')
    .styles(['resources/assets/css/'], 'public/css/main.css')
    .copy(['resources/assets/media/'], 'public/media')
    .copy(['resources/assets/webfonts/'], 'public/webfonts')
    .copy(['resources/assets/fonts/'], 'public/fonts')
    .sourceMaps();
