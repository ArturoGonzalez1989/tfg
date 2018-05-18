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
Route::get('cuenta', ['as' => 'cuenta', 'uses' => 'PagesController@cuenta']);
Route::get('base_legal', ['as' => 'base_legal', 'uses' => 'PagesController@base_legal']);
Route::get('recomendar-rutas', ['as' => 'recomendar-rutas', 'uses' => 'PagesController@recomendarRutas']);
Route::get('contacto', ['as' => 'contacto', 'uses' => 'PagesController@contacto']);

Route::get('rutas_usuario/{id}', ['as' => 'rutas_usuario', 'uses' => 'ControladorRutas@rutas_usuario']);
Route::get('mensajes/crear/{id}', ['as' => 'mensajes.crear', 'uses' => 'ControladorMensajes@crear']);
// Route::get('explorar_ciudades', ['as' => 'explorar_ciudades', 'uses' => 'PagesController@explorar_ciudades']);
// Route::get('explorar_comunidades', ['as' => 'explorar_comunidades', 'uses' => 'PagesController@explorar_comunidades']);

Route::resource('mensajes_rutas', 'ControladorMensajesRutas');
Route::resource('mensajes_puntos', 'ControladorMensajesPuntos');
Route::resource('usuarios', 'ControladorUsuarios');
Route::resource('rutas', 'ControladorRutas');
Route::resource('puntos', 'ControladorPuntos');
Route::resource('tematicas', 'ControladorTematicas');
//Route::resource('selecciones', 'ControladorSelecciones');
// Route::get('mensajes/{mensaje}/ruta/edit', ['as' => 'mensajes.edit_ruta', 'uses' => "ControladorMensajesRutas@edit"]);
// Route::get('mensajes/{mensaje}/punto/edit', ['as' => 'mensajes.edit_punto', 'uses' => "ControladorMensajesPuntos@edit"]);

Route::resource('ciudades', 'ControladorCiudades');

Route::post('rutas-ciudad', ['as' => 'rutas-ciudad', 'uses' => 'PagesController@verRutas']);
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

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
