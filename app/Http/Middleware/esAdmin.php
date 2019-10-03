<?php

namespace App\Http\Middleware;

use Closure;

class EsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        //Capturamos el valor que nos envie la variable por url
        //route captura el variable get
        //input por otros metodos
        if ($request->route('admin') != 'gustavo') {
            return redirect('frutas'); // redirecciona a la ruta que le especfiquemos
        }

        //entra y ejecuta el next
        return $next($request);


        /*Ejemplos de redirecciones*/

        //Redirigir a una url
        return redirect('/');

        //Redirigir a la url anterior
        return redirect()->back();

        //Redirigir a una ruta
        return redirect()->route('home');

        //Redirigir a una acción
        return redirect()->action('App\Http\Controllers\HomeController@index');

        //Pasar parámetros a las dos últimos tipos de rutas, le pasamos como segundo parámetro un array
        return redirect()->route('profile', array('user' => 1));


    }
}
