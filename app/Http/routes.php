<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/**
 * Multi language group
 */
group(
    setMultilangRouting(),
    function () {
        group(
            ['before' => 'auth'],
            function () {
                get('account', ['as' => 'account', 'uses' => 'AccountController@account']);
                get('account/edit', ['as' => 'account.edit', 'uses' => 'AccountController@edit']);

                group(
                    ['prefix' => 'api/v1'],
                    function () {
                        resource('account', 'AccountApiController', ['only' => ['show', 'update', 'destroy']]);
                    }
                );
            }
        );

        get('login', ['as' => 'login', 'uses' => 'UserController@login']);
        get('register', ['as' => 'register', 'uses' => 'UserController@register']);
        post('login', ['as' => 'post.login', 'uses' => 'UserController@postLogin']);
        post('register', ['as' => 'post.register', 'uses' => 'UserController@postRegister']);

        get('password/remind', ['as' => 'password.remind', 'uses' => 'UserController@remind']);
        get('password/reset/{token}', ['as' => 'password.reset', 'uses' => 'UserController@reset']);
        post('password/remind', ['as' => 'post.password.remind', 'uses' => 'UserController@postRemind']);
        post('password/reset', ['as' => 'post.password.reset', 'uses' => 'UserController@postReset']);

        get('logout', ['as' => 'logout', 'uses' => 'UserController@logout']);

        get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

        // dev links
        get('_dev', ['as' => '_dev', 'uses' => 'DevController@index']);
        get('_dev/emails/{email}', ['as' => '_dev.emails', 'uses' => 'DevController@emails']);

        get('{path?}', 'ContentController@dynamicRouter')->where('path', '.*');
    }
);

app()->make('user.menu')->addLink(URL::route('account'), 'user.my_account');
//App::make('user.menu')->addChild(['url' => URL::route('logout'), 'title' => 'common.logout'], URL::route('account'));


// Laravel 5 DEFAULT ROUTES
//get('/', 'WelcomeController@index');
//
//get('home', 'HomeController@index');
//
//Route::controllers([
//	'auth' => 'Auth\AuthController',
//	'password' => 'Auth\PasswordController',
//]);
