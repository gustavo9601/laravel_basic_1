<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrutasController extends Controller


{

    //Accion que devuelva una vista
    public function index()
    {
        //retornamos una vista
        //con with le enviamos parametros
        return view('frutas.index')
            ->with('frutas', ['naranja', 'pera', 'manzana', 'banano']);
    }


    public function naranjas(){
        return 'Accion de Naranjas';
    }

    public function peras(){
        return 'Accion de Peras';
    }
}
