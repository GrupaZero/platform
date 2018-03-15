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

addMultiLanguageRoutes([
    'domain'     => config('gzero.domain'),
    'middleware' => ['web']
], function ($router, $language) {
    /** @var Router $router */
    $router->get('/', '\Gzero\Cms\Http\Controllers\HomeController@index')->name(mlSuffix('home', $language));
});

addRoutes([
    'middleware' => ['web']
], function ($router) {
    $router->view('/spa-demo/{name?}', 'spa-demo')->where(['name' => '[a-z][a-z0-9-/]*']);
});
