const {mix} = require('laravel-mix');

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
    .extract(['vue'])
    .sass('resources/assets/sass/app.scss', 'public/css');

if (mix.config.inProduction) {
    mix.version();
}

// If you want to use BrowserSync you'd need to proxy requests to docker container, but then you'd need
// to remember that requests to api won't work due to auth cookie mismatch.
// A known workaround for this is to add same laravel_token cookie for api.dev.gzero.pl domain as for localhost:3000.
// mix.browserSync({
//     proxy: {
//         target: "https://dev.gzero.pl"
//     }
// });
