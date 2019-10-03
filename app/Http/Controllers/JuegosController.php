<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JuegosController extends Controller
{

    public function index()
    {

        return "Eso es el index" ;
    }

    public function peliculas()
    {
        return ['halo', 'fifa'];
    }

}
