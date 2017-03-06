const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
  mix

  /**
   * Copy needed files from /node directories
   * to /public directory.
   */
    .copy(
      'node_modules/jquery-colorbox/i18n',
      'public/js/vendor/jquery-colorbox/i18n'
    )
      .copy(
      'node_modules/bootstrap-sass/assets/fonts/bootstrap',
      'public/build/fonts/bootstrap'
    )

    .sass('app.scss')
    .webpack('app.js')

    .version(['css/app.css', 'js/app.js']);

    if (mix.production) {
        mix.version([
            'css/app.css', 'js/app.js'
        ]);
    }
});
