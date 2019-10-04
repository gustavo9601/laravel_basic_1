<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormulariosController extends Controller
{
    public function loadFormulario1()
    {

        return view('formulario1');

    }


    public function recibirFormulario(Request $request)
    {
        $data = $request->all();  // obtenemos los valores enviados en un arreglo por la peticion
        $description = $request->input('description');  // obtengo solo el valor del atributo con el input


       // dd($request);
       return 'El nombre de la fruta es :' . $data['name'] . ' y la descripcion es : ' . $description;

    }
}
