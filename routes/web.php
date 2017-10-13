<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Routing\Router;

Route::middleware(['auth'])->group(function () {
    Route::get('logout', 'Auth\LoginController@logout')->name('logout');
});

// START Laravel Auth routes
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('post.login');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register')->name('post.register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('post.password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('post.password.reset');
// END Laravel Auth routes

addMultiLanguageRoutes(function ($router, $language) {
    /** @var Router $router */
    $router->get('/', function () {
        $blocks = [
            ['title' => 'First Block', 'body' => 'First block body text'],
            ['title' => 'Second Block', 'body' => 'Second block body text']
        ];

        return view('home', ['blocks' => $blocks]);
    })->name(mlSuffix('home', $language));
});

