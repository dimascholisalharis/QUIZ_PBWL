<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//ARTIST
Route::get('/artist', 'ArtistController@index');
Route::get('/artist/create', 'ArtistController@create');
Route::post('/artist', 'ArtistController@store');
Route::get('artist/{id}/edit','ArtistController@edit');
Route::patch('artist/{id}', 'ArtistController@update');
Route::delete('artist/{id}', 'ArtistController@destroy');


//ALBUM
Route::get('/album', 'AlbumController@index');
Route::get('/album/create', 'AlbumController@create');
Route::post('/album', 'AlbumController@store');
Route::get('album/{id}/edit','AlbumController@edit');
Route::patch('album/{id}', 'AlbumController@update');
Route::delete('album/{id}', 'AlbumController@destroy');

//TRACKS
Route::get('/tracks', 'TracksController@index');
Route::get('/tracks/create', 'TracksController@create');
Route::post('/tracks', 'TracksController@store');
Route::get('tracks/{id}/edit','TracksController@edit');
Route::patch('tracks/{id}', 'TracksController@update');
Route::delete('tracks/{id}', 'TracksController@destroy');


//PLAYED
Route::get('/played', 'PlayedController@index');
Route::get('/played/create', 'PlayedController@create');
Route::post('/played', 'PlayedController@store');
Route::get('played/{id}/edit','PlayedController@edit');
Route::patch('played/{id}', 'PlayedController@update');
Route::delete('played/{id}', 'PlayedController@destroy');