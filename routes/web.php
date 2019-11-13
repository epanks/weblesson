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

Route::resource('paket', 'paketController');

Route::post('paket/update', 'paketController@update')->name('paket.update');

Route::get('paket/destroy/{id}', 'paketController@destroy');
