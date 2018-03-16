let mix = require('laravel-mix')

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
    .extract(['vue', 'vue-i18n', 'axios', 'bluebird', 'lodash', 'js-cookie'])
    .sass('resources/assets/sass/app.scss', 'public/css')

mix.js('resources/assets/js/admin.js', 'public/js')

if (mix.inProduction) {
    mix.version()
}

mix.webpackConfig({
    output: {
        chunkFilename: 'js/chunks/[name].[id].js',
        publicPath: '/'
    }
})