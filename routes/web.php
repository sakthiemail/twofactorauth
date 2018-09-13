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
    return view('welcome');
});

// Two Factor Authentication
Route::get('2fa', 'TwoFactorController@showTwoFactorForm');
Route::post('2fa', 'TwoFactorController@verifyTwoFactor');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
