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

Route::get('/', function () {
    $blocks = [
        ['title' => 'First Block', 'body' => 'First block body text'],
        ['title' => 'Second Block', 'body' => 'Second block body text']
    ];

    return view('home', ['blocks' => $blocks]);
})->name('home');
