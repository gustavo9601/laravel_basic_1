{{--========Heredamos de una plantilla=======--}}

{{--Extendemos de la plantilla padre--}}
@extends('layout.template')


{{--Le pasamos parametro a una de las secciones definidas en el padre--}}
@section('title', 'Soy el hijo')


{{--Podemos llamar la estructura y reemplezar su contenido--}}
@section('header')
    <h2>Reemplazando el cabecero desde el hijo</h2>
@stop

{{--Aunque el padre es un yield, se puede usar tambien como section y reemplazar los datos--}}
@section('content')
    <p>Contenido nuevo desde el hijo</p>
@stop


{{--Podemos llamar la estructura y colocar lo que tenga el padre + lo que le quiera poner--}}
@section('footer')
    @parent()  {{--Permite llamar lo que venga del padre--}}

    <h2>Copyright Gustavo Marquez</h2>
@stop