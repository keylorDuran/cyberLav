<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Rutas para Login*/
Route::get('/', function () {
    return view('user.login');
});

Route::post('logon', 'UserController@logon');

/*Rutas para Home*/
Route::get('inicio', function () {
    return view('home.home');
});

/*Rutas para UserController*/
Route::resource('users', 'UserController');
Route::post('register', 'UserController@store');
Route::post('logon', 'UserController@logon');

/*Rutas para cantantes*/
Route::resource('artists', 'ArtistController');

/*Rutas para canciones*/
Route::resource('songs', 'SongController');
Route::get('songs/{id}/delete', 'SongController@destroy');
Route::post('songs/{id}/update', 'SongController@update');

/*Rutas para playlist*/
Route::resource('playlists', 'PlayListController');
Route::get('playlists/{id}/select', 'PlayListController@select');
