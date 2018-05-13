let mix = require('laravel-mix');
let tailwindcss = require('tailwindcss');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .js('resources/assets/js/fapp.js', 'public/js')
   .sass('resources/assets/sass/fapp.scss', 'public/css')
   .options({
       processCssUrls: false,
       postCss: [tailwindcss('tailwind.js')],
   })
   .webpackConfig({
       resolve: { symlinks: false }
   })
   .version();

