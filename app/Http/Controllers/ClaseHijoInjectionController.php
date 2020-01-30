<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ClasePadreInjectionController;


class ClaseHijoInjectionController extends Controller
{


    protected $variableIjection;

    //inyectamos una clase y la encapsulamos en una variable, de forma que tenemos acceso de todas las propiedases en la variable

    // es como si se creara una nueva instancia de la otra clase  $pruebas = new ClasePadreInjectionController()
    function __construct(ClasePadreInjectionController $variableIjection)
    {
        $this->variableIjection = $variableIjection;

    }



    public function showMessagesFromHijo(){

        return response()->json([
           'messageFromPadreInHijo' => $this->variableIjection->showMessagesFromPadre()   // podemos acceder a las funciones del padre
        ]);
    }
}
