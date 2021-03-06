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
    return redirect('/post');
});

Auth::routes();

Route::get('/home', function () {
    return redirect('/post');
});

Route::resource('post', 'PostController');

Route::prefix('vue/')->as('vue.')->group(function () {
    Route::get('/{any}', function () {
        return view('spa.index');
    });

    // Route::get('login-form', 'JSApp\LoginController@index');
});

Route::prefix('api/web/v1/')->as('web.api.')->middleware('auth')->namespace('Api\v1')->group(function () {

    Route::apiResource('post', 'PostController');

    Route::apiResource('category', 'CategoryController');
});
