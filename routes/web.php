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

Route::redirect('/','/auth/login');

Route::prefix('auth')->group(function () {
    Route::get('login', 'LoginController@index');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout');
});
Route::get('home', 'HomeController@index');
Route::get('users', 'UserController@index');
Route::post('users', 'UserController@post');
Route::delete('users/{idUser}', 'UserController@delete');
Route::put('users/{idUser}', 'UserController@put');
Route::put('users/disable/{idUser}', 'UserController@disable');
Route::put('users/enable/{idUser}', 'UserController@enable');