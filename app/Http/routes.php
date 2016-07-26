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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::auth();

Route::get('/', 'HomeController@index');

/*
|--------------------------------------------------------------------------
| Rutas CRUDS de ARTISTAS
|--------------------------------------------------------------------------
*/
Route::get('artists', 'ArtistController@index');
Route::get('artists/create', 'ArtistController@create');
Route::get('artists/{id}/show', 'ArtistController@show');
Route::get('artists/{id}/edit', 'ArtistController@edit');

//"artists" por "post" para almacenar un nuevo registro
Route::post('artists', 'ArtistController@store');

//"artists/id" por "put" para actualizar el registro "id"
Route::match(['put', 'patch'], 'artists/{id}', 'ArtistController@update');

//"artista/id" por "delete" para eliminar el registro "id"
Route::delete('artists/{id}', 'ArtistController@destroy');

//Route::resource('albums','AlbumController');

/*
|--------------------------------------------------------------------------
| Rutas CRUDS de ALBUMS
|--------------------------------------------------------------------------
*/
Route::get('albums/graphic-data', 'AlbumController@graphicdata');
Route::get('albums/graphic', 'AlbumController@graphic');
