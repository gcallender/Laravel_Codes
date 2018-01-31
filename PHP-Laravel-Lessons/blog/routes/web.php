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

/*

	GET, POST, PUT, DELETE

*/

// Original
/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', function () {
    return view('welcome2');
});

// Rutas para CRUD
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
	
	/*
	 * Route::resource(nombre_ruta, nombre_controlador);
	 */
    Route::resource('users', 'UsersController');
    Route::get('users/{id}/destroy', [
    	'uses' 	=> 'UsersController@destroy',
    	'as'	=> 'users.destroy',
    ]);

    Route::resource('categories', 'CategoriesController');
    Route::get('categories/{id}/destroy', [
    	'uses' 	=> 'CategoriesController@destroy',
    	'as'	=> 'categories.destroy',
    ]); 

    Route::resource('tags', 'TagsController');
    Route::get('tags/{id}/destroy', [
    	'uses' 	=> 'TagsController@destroy',
    	'as'	=> 'tags.destroy',
    ]); 

    Route::resource('articles', 'ArticlesController');
    Route::get('articles/{id}/destroy', [
    	'uses' 	=> 'ArticlesController@destroy',
    	'as'	=> 'articles.destroy',
    ]);    

});

// Autenticacion
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home_custom');

// Acceso a carpeta y archivo - Modo 1
/*Route::get('/', function () {
    return view('test.index');
});*/
// Acceso a carpeta y archivo - Modo 2
/*Route::get('/', function () {
    return view('test/index');
});*/

/*
// Para acceder: /public/articles
Route::get('articles', function() {
	echo "<p>
	Esta es la sección de artículos.
	</p>";
});
*/

/*
// Para acceder: /public/articles
// Recibir parametros por la barra de direcciones
Route::get('articles/{nombre?}', function($nombre = "null") {
	echo "<p>
	El nombre que has colocado es: $nombre
	</p>";	
});
*/


// Para acceder: /public/views/articles
// Grupo de rutas - forma 1
/*
Route::prefix('views')->group(function () {
	Route::get('articles/{nombre?}', function($nombre = "null") {
		echo "<p>
		$nombre.
		</p>";	
	});
});
*/
/*
// Grupo de rutas - forma 2
Route::group(['prefix' => 'views'], function() {
	Route::get('articles/{nombre?}', function($nombre = "null") {
		echo "<p>
		$nombre.
		</p>";	
	});
});
*/


// Ruta hacia un controlador - Metodo 1
//Route::get('view/{id}', 'TestController@view');
// Ruta hacia un controlador - Metodo 2
/*
Route::get('view/{id}', [
	'uses'	=> 'TestController@view',
	'as'	=> 'articlesView'
]);
*/


