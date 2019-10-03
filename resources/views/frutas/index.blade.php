<h2>Listado de frutas</h2>


{{--
{{action('FrutasController@naranjas')}}  // de esta forma
//usamos el helper que retorna la url que retorne el controlador en la funcion especficia
--}}
<a href="{{action('FrutasController@naranjas')}}">Ir a naranjas</a>
<br>
{{--con route en vez de action, le especificamos el nombre que le asginamos a la ruta con el as--}}
<a href="{{route('peritas')}}">Ir a Peras</a>


<ul>
    @foreach($frutas as $fruta)
        <li>{{$fruta}}</li>
    @endforeach

</ul>