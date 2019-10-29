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
    return view('home');
})->name('home')->middleware('auth');

Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

Route::resource('users', 'UserController')->middleware('auth');
Route::post('users/{user}/enable', ['as' => 'users.enable', 'uses' => 'UserController@enable'])->middleware('auth');
Route::post('users/{user}/disable', ['as' => 'users.disable', 'uses' => 'UserController@disable'])->middleware('auth');

Route::get('system', ['as' => 'system', 'uses' => 'SystemController@index'])->middleware('auth');
