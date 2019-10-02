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


//Rutas basicas
Route::get('/hola-mundo', function () {
    return "<h1>Hola Mundo</h1>";
});

Route::get('/llamando-vista1', function () {
    return view('vista1'); // cargamos la vista de
    //Resources/views/  ..blade.php
});

/** Rutas básicas */

// Ruta que apunta al WellcomeController y a la acción index
Route::get('/', 'WelcomeController@index');

// Ruta que apunta al controlador HomeController y a la acción index
Route::get('home', 'HomeController@index');

// Ruta básica con GET
Route::get('/hola-mundo', function () {
    return 'Hola Mundo!! victorroblesweb.es';
});

/* Podriamos utilizar los métodos get,post,put y delete
 * para montar un API Rest con Laravel 5.*/

//Para habilitar esta parte se debe habilitar en VerifyCrfToken en el Kerner.php
Route::post('foo/bar', function () {
    return 'Hola Mundo!! victorroblesweb.es';
});

Route::put('foo/bar', function () {
    return 'Hola Mundo!! victorroblesweb.es';
});

Route::delete('foo/bar', function () {
    return 'Hola Mundo!! victorroblesweb.es';
});


// Ruta para múltiples métodos HTTP
Route::match(['get', 'post'], '/hola-mundo-multiple', function () {
    return 'Hola Mundo GET y POST!! victorroblesweb.es';
});

//Cualquier metodo http
//Se debe desactivar en el kernel el VerfyCrsToken
Route::any('hola-mundo-cualquiera', function () {
    return 'Hola Mundo para cualquier verbo HTTP!! victorroblesweb.es';
});


/*Parámetros en las rutas*/

// Pasar parámetro
Route::get('pelicula/{id}', function ($id) {
    return 'Pelicula ' . $id;
});


//Parametro recibido y pasado a la vista y haciendolo opcional
Route::get('parametro-a-vista/{parametro?}', function ($parametro = 'Parametro default') {

    return view('vista1', [
        'parametro' => $parametro
    ]);


    /*
     * Otra forma de pasarle datos a la vista
    return view('vista1')->with('parametro', $parametro)
                        ->with(.....);
     *
     * */

});

/*
Si le queremos pasar un parámetro a una acción seria igual que aquí solamente que abría que pasar el parámetro $id en el método action del controlador al que se está llamado.
*/

// Pasar parámetro opcional y un valor por defecto
Route::get('pelicula-opcional/{titulo?}', function ($titulo = 'Batman Begins') {
    return $titulo;
});

// Restricción en el parámetro
Route::get('pelicula-parametro-filtrado/{titulo}/{descripcion}', function ($titulo, $descripcion) {
    return "titulo:" . $titulo . " y descripcion: " . $descripcion;
})
    ->where('titulo', '[A-Za-z]+'); //Expresión regular

// Multiples restricciones
Route::get('pelicula-varias-restricciones/{id}/{titulo}', function ($id, $titulo) {
    return $id . " " . $titulo;
})
    ->where(['id' => '[0-9]+',
        'titulo' => '[a-zA-Z]+']); //valida los parametos con expresiones regulares de php


//retornando en una vista dentro de una carpeta
Route::get('contacto/{nombre?}/{apellido?}', function ($nombre = 'Gustavo', $apellido = 'Marquez') {


    $arreglo = [
      'naranja', 'pera', 'sandia', 'pina'
    ];

    //contacto.contacto   //directorio.archivo
    return view('contacto.contacto')->with('nombre', $nombre)
        ->with('apellido', $apellido)
        ->with('frutas', $arreglo);
});



//Llamando vista que hereda de un template con section y yield
Route::get('/hijo-vista', function (){
   return view('layout.hijo');
});

//Colocando nombre a las rutas, para poder ser accesadas o usadas por otras rutas
Route::get('/index/{section?}', ["as" => "nombre", "uses" => "PruebasController@index"]);

//redirecciona a la ruta que anteriormente se llamo
return redirect()->route("nombre", array("section" => "Contenido de un parametro"));


