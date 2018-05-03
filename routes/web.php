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

// utilizamos alias en las rutas por si en el futuro en futuras administraciones o revisiones de código queremos cambiar el nombre de una ruta y algunos de los recursos de la aplicacion apunta a un enlace, habrá que cambiarlos manualmente uno por uno, en cambio, con alias solo se cambia desde aquí.

Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home']);
Route::get('base_legal', ['as' => 'base_legal', 'uses' => 'PagesController@base_legal']);
Route::get('explorar', ['as' => 'explorar', 'uses' => 'PagesController@explorar']);

Route::resource('mensajes', 'ControladorMensajes');
Route::resource('usuarios', 'ControladorUsuarios');
Route::resource('rutas', 'ControladorRutas');
Route::resource('puntos', 'ControladorPuntos');
//Route::resource('selecciones', 'ControladorSelecciones');

Route::resource('ciudades', 'ControladorCiudades');

// Route::get('ciudades/{ciudad}', function (Ciudad $ciudad) {
//     return view('ciudades.show')->with('ciudad', $ciudad);
// });

Route::resource('comunidades', 'ControladorComunidades');

// Route::get('ciudades/{id}', function ($ciudad) {
//     return "$ciudad caca";
// });

//Route::get('ciudades/{id}', ['as' => 'ciudades.show', 'uses' => 'ControladorCiudades@show']);

Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login'); // Si se intenta acceder a un recurso no permitido por el controlador o el middleware, redirecciona al login.

Route::get('logout', 'Auth\LoginController@logout');
// Route::post('login', ['as' => 'login', 'uses' => 'Auth\LoginController@login']); // Si se intenta acceder a un recurso no permitido por el controlador o el middleware, redirecciona al login.
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
