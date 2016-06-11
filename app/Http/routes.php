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

Route::get('/', function () {
    return view('welcome');
});

// Rutas para EstudianteController

Route::post('/api/estudiante/store', ['uses' => 'EstudianteController@store']);

Route::get('/api/estudiante/login/{identificacion}/{password}', 'EstudianteController@login');

/*
*
* Rutas Generales
*
*/

Route::get('/api/municipios/', 'GeneralController@getMunicipios');
Route::get('/api/colegios/{municipio}', 'GeneralController@getColegios');