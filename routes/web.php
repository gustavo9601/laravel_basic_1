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
Route::get('/hijo-vista', function () {
    return view('layout.hijo');
});

//Colocando nombre a las rutas, para poder ser accesadas o usadas por otras rutas
Route::get('/index/{section?}', ["as" => "nombre", "uses" => "PruebasController@index"]);


//Redireccion
//redirecciona a la ruta que anteriormente se llamo
//return redirect()->route("nombre", array("section" => "Contenido de un parametro"));


/*
 * ==========================================
 * ==========================================
 * ==========================================
 *
 *
 *
*/

//Rutas con controlador

//usamos la ruta frutas
//llamos al controlador FrutasController
//llamos la funcion index
Route::get('/frutas', 'FrutasController@index');

Route::get('/naranjas', 'FrutasController@naranjas');
//con el as le damos un nombre a la ruta, desde la cual se puede acceder solo con el nombre
Route::get('/peras', [
    'uses' => 'FrutasController@peras',
    'as' => 'peritas'
]);


//Ruta que usa un middleware
//en un array le pasamos los indices, el midelware que usara y con uses el controlador y funcion a ejecutarr
Route::get('/juegos/{admin?}', [
    'middleware' => 'EsAdmin',  // ['EsAdmin', 'OtroMiddleware']  cuando son varios middleware
    'uses' => 'JuegosController@index'
]);

//Ruta que tiene un middleware en el Controlador
Route::get('/middleware-controller/{admin?}', 'middlewareInControllerController@test');

// Ruta que inyecta una clase en otra, en el constructor
Route::get('/inyeccion-clase', 'ClaseHijoInjectionController@showMessagesFromHijo');



//Ruta que recibe un post y valida los campos a recibir
Route::post('/validacion-controller', 'ValidacionEntradasController@store');


//Grupo de rutas, a los cuales se les coloca a todas un pregijo
//en un array le especficamos el prefijo
//dentro de la funcion especificamos la otras rutas
Route::group(['prefix' => 'heroes'], function () {

    //todas las rutas quedarian
    // /heroes/....
    Route::get('/superman', function () {
        return "Superman";
    });
    Route::get('/batman', function () {
        return "Batman";
    });
    Route::get('/hombre-arana/{telarana}', function ($telarana) {
        return "Hombre arana con:  " . $telarana;
    });

});


//Ruta de formulario
Route::get('/formularios', 'FormulariosController@loadFormulario1');
Route::post('/formularios', 'FormulariosController@recibirFormulario');


//Ruta de Notas, que usa el Query Builder
Route::get('/notas', 'NotesController@getIndex');

//ruta de vista del formulario
Route::get('/notas/nueva', 'NotesController@getSaveNote');
//Ruta de vista que recibe la peticion de envio del formulario
Route::post('/notas/nueva', 'NotesController@saveNote');
//Ruta que obtiene por id una nota
Route::get('/notas/{id}', 'NotesController@getNoteId');
//Ruta para mostrar el formulario actualizar una nota por id
Route::get('/notas/actualizar/{id}', 'NotesController@getFormularioActualizarNota');
//Ruta para actualizar la informacion que viene del formulario por id
Route::post('/notas/actualizar/{id}', 'NotesController@actualizarNote');
//Ruta para eliminar por id
Route::get('/notas/eliminar/{id}', 'NotesController@deleteNoteId');






/*
==========================================================
============================================================
============================================================
*/

// Pattern que valida todas las variables get, de todas las ritas hacia abajo, para que sea numero
Route::pattern('id', '\d+');

Route::get('/posts', 'PostController@index');
Route::get('/posts/{id}', 'PostController@show');
Route::post('/posts/store',
    ['uses' => 'PostController@store']
);
Route::delete('/posts/destroy/{id}', 'PostController@destroy');


