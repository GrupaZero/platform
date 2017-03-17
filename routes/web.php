<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// We need to handle Croppa here because of our catch all routes bellow
Route::get('{path}', '\Bkwld\Croppa\Handler@handle')
    ->where('path', app('Bkwld\Croppa\URL')->routePattern());

Route::group(
    setMultilangRouting(['middleware' => ['web']]),
    function ($router) {
        /** @var \Illuminate\Routing\Router $router */
        // Account
        $router->group(
            ['middleware' => 'auth'],
            function ($router) {
                /** @var \Illuminate\Routing\Router $router */
                $router->get('account', 'AccountController@account')->name('account');
                $router->get('account/edit', 'AccountController@edit')->name('account.edit');
                $router->get('account/welcome', 'AccountController@welcome')->name('account.welcome');
                $router->get('account/oauth', 'AccountController@oauth')->name('account.oauth');
            }
        );
        // START Laravel Auth routes
        // Authentication Routes...
        $router->get('login', 'Auth\LoginController@showLoginForm')->name('login');
        $router->post('login', 'Auth\LoginController@login')->name('post.login');
        $router->post('logout', 'Auth\LoginController@logout')->name('logout');

        // Registration Routes...
        $router->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
        $router->post('register', 'Auth\RegisterController@register')->name('post.register');

        // Password Reset Routes...
        $router->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
        $router->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('post.password.email');
        $router->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset.token');
        $router->post('password/reset', 'Auth\ResetPasswordController@reset')->name('post.password.reset');
        // END Laravel Auth routes

        $router->get('/', 'HomeController@index')->name('home');
        $router->get('{path?}', 'ContentController@dynamicRouter')->where('path', '.*');
    }
);

if (config('gzero.multilang.enabled')) {
    Route::group(
        [
            'domain'     => config('gzero.domain'),
            'middleware' => 'web'
        ],
        function ($router) {
            /** @var \Illuminate\Routing\Router $router */
            // By default we're redirecting to multi language page
            $router->get(
                '/',
                function () {
                    return redirect()->to(route('home'), 301);
                }
            );
            // We are doing this because we want to have access to user session on 404 page
            $router->get(
                '{path?}',
                function () {
                    return abort(404);
                }
            )->where('path', '.*');
        }
    );
}
