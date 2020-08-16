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
    .scripts([
        'resources/asset/js/main.js',
        'resources/asset/js/slider.js'
    ],'public/js/all.js')
    .styles([
        'resources/asset/css/main.css',
        'resources/asset/css/slider.css'
    ],'public/css/all.css')
    .copy('resources/asset/css/main.css','public/css/main.css')
    .copy('resources/asset/js/main.js','public/js/main.js')
    .copyDirectory('resources/asset/fonts','public/fonts');

mix.browserSync('http://127.0.0.1:8000');