var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass([
        'app.scss'
    ]);
    mix.scripts([
        'cookies.js',
        'responsive-paginate.js',
        'jquery.metisMenu.js',
        'jquery.colorbox.js',
        'jquery.matchHeight.js',
        'common.js'
    ]);
});
