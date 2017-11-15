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

Route::get('/', 'PagesController@index');

Route::get('/list', 'GamesController@index');

Route::get('/game/{id}', 'GamesController@game');

Route::resource('games', 'GamesController');
Route::resource('rates', 'RatesController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
