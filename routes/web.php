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

Route::group(
    setMultilangRouting(['middleware' => ['web']]),
    function () {
        // Account
        Route::group(
            ['middleware' => 'auth'],
            function () {
                Route::get('account', ['as' => 'account', 'uses' => 'AccountController@account']);
                Route::get('account/edit', ['as' => 'account.edit', 'uses' => 'AccountController@edit']);
                Route::get('account/welcome', ['as' => 'account.welcome', 'uses' => 'AccountController@welcome']);
                // @TODO Why do we need this here?
                //Route::group(
                //    ['prefix' => 'api/v1'],
                //    function () {
                //        Route::resource('account', 'AccountApiController', ['only' => ['show', 'update', 'destroy']]);
                //    }
                //);
            }
        );
        // START Laravel Auth routes
        // Authentication Routes...
        Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
        Route::post('login', 'Auth\LoginController@login')->name('post.login');
        Route::post('logout', 'Auth\LoginController@logout')->name('logout');

        // Registration Routes...
        Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'Auth\RegisterController@register')->name('post.register');

        // Password Reset Routes...
        Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
        Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('post.password.email');
        Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset.token');
        Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('post.password.reset');
        // END Laravel Auth routes

        Route::get('/', 'HomeController@index')->name('home');
        Route::get('{path?}', 'ContentController@dynamicRouter')->where('path', '.*');
    }
);


// By default we're redirecting to multi language page
// @TODO If multi language support enabled
Route::get(
    '/',
    function () {
        return redirect()->to(route('home'));
    }
);
