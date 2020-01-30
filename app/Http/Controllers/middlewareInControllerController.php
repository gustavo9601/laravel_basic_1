<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class middlewareInControllerController extends Controller
{


    public function __construct()
    {
        $this->middleware(['EsAdmin']);

        /*
         * // Especificamos a solo los metodos que aplicara el middleware
        $this->middleware(['EsAdmin', [
            "only" =>  ['funcion1', 'funcion2']
        ]]);
        */

    }

    public function test()
    {
        return response()->json(['message' => 'Hola Mundo'], 200);
    }

}
