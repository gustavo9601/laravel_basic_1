<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Usamos el DB para acceder a la bd
use Illuminate\Support\Facades\DB;

class NotesController extends Controller
{
    //
    public function getIndex()
    {


        /*
         * Accedemos a la tabla notas
         * con el get obtebemos el resultado
         * ->orderBy(columna, orden)
         * */
        $notas = DB::table('notes')
            ->orderBy('id', 'desc')
            ->get();

        //dd($notas);

        //retornamos el valor en una vista
        //le pasamos el arreglo de datos dentro de otro arreglo
        return view('notes.notes', ['notas' => $notas]);

    }


    public function getNoteId($id)
    {

        //accedemos a la table notes
        //where('columna', 'valor de comparacion')
        //first() hace el get de solo el primer registro
        $nota = DB::table('notes')->where('id', $id)->first();

        //si se requieren campos puntuales se usa ->select('campo1', 'campo2')
        //si hay mas condiciones and, solo se coloca otro ->where(condicion)
        //si se quiere un or se usa   ->orWhere(condicion)
        //si se requiere validacion de signos se usa ->where('edad', '>', 40)

        /*Join
        $peliculas=DB::table('peliculas')
            ->join('cineastas', 'cineastas.id', '=', 'peliculas.cineasta_id')
            ->select('peliculas.titulo', 'peliculas.anio', 'cineastas.nombre')
            ->get();

        */


        //Si no retorna ningun dato la consulta
        //lo rederijimos
        if (empty($nota)) {

            //se redirijira hacia esta clase y funcion
            return redirect()->action('NotesController@getIndex');
        }

        //si hay datos usamos la vista y le pasamos en un array el array retornado
        return view('notes.notes', ['notaSola' => $nota]);

    }


    public function getSaveNote()
    {
        $opcion = 'formulario';
        return view('notes.notes', ['opcion' => $opcion]);
    }


    public function saveNote(Request $request)
    {
        //dd($request);


        //el input captura del request, el valor de la columna que le pasemos del arreglo
        $title = $request->input('title');
        $description = $request->input('description');

        //verificamos que si vengan por lo menos datos
        if (isset($title) && isset($description)) {


            //accedemos a la tabla
            //-> insert recibe un arreglo con los nombres de las columnas y sys valores
            $nuevaNota = DB::table('notes')->insert([
                'title' => $title,
                'description' => $description
            ]);

            if (isset($nuevaNota)) {
                return redirect()->action('NotesController@getIndex');
            } else {
                return "<p>Error no se pudo crear, verifique la BD</p>";
            }
        } else {
            return "<p>Error alguno de los campos no fue digitado</p>";
        }
    }


    public function deleteNoteId($id)
    {

        //accedemos a la table notes
        //where('columna', 'valor de comparacion')
        //first() hace el get de solo el primer registro
        $nota = DB::table('notes')->where('id', $id)->delete();


        //Si no retorna ningun dato la consulta
        //lo rederijimos
        if (empty($nota)) {

            //se redirijira hacia esta clase y funcion
            return "<p>No se pudo eliminar el registro, verifique la BD</p>";
        }

        //si hay datos usamos la vista y le pasamos en un array el array retornado
        //con el with le pasamos a la redireccion de ese controlador una variable de SESION, sirve por si queremos enviar un mensaje, ya que la crea la renderiza y la elimina
        return redirect()->action('NotesController@getIndex')->with('respuestaAccion', 'Se elimino el registro con id ' . $id, ' Correctamente !!!');

    }

    /*
     * id  => por url
     * Request vendra por post
     * */
    public function actualizarNote($id, Request $request)
    {

        $note = DB::table('notes')->where('id', $id)
            ->update([
                'title' => $request->input('title'),
                'description' => $request->input('description')
            ]);

        if($note){
            return redirect()->action('NotesController@getIndex')->with('respuestaAccion', 'Nota actualizada correctamente');
        }else{
            return "<p>No se pudo actualizar la nota</p>";
        }

    }


    public function getFormularioActualizarNota($id){

        $nota = DB::table('notes')->where('id', $id)->first();

        if(isset($nota)){
            return view('notes.notes', ['notaActualizar' => $nota]);

        }else{
            return "<p>No existe notas con el id proporcionado</p>";
        }

    }




}
