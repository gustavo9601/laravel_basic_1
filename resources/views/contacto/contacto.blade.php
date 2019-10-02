{{--hace el include del archivo--}}
{{--
contacto => carpeta
cavecera => archivo blade

le pasamos en un arreglo los parametros a la plantilla
--}}
@include('contacto.cabecero', ['nombre' => $nombre])


<h2>Contacto en blade</h2>
<p>Nombre pasado por url o default: {{$nombre}}</p>


{{--
//!!  !!  Parsea la variable a HTML
--}}
<p>Apellido pasado por url o default: {!!$apellido!!}</p>


<hr>

{{--======== Condicionales ==========--}}

{{--condicional ternario--}}
<p>{{ ($nombre == 'Gustavo') ? 'El nombre viene por default' : 'El nombre si se paso por parametro'  }}</p>


{{--if normal--}}
@if($apellido == 'Marquez')
    <p>Se envio el apellido por default</p>
@else
    <p>El apellido enviado es {{$apellido}}</p>
@endif

<hr>

{{--======== Bucles ==========--}}

{{--For--}}
<p>Tabla del 5</p>
<p>For</p>
<ul>
    @for($i= 0; $i<10; $i++)
        <li>{{$i . " x 2 = " . ($i * 5)}}</li>
    @endfor
</ul>


{{--While--}}
<p>While</p>
<?php $contador = 0; ?>
@while($contador <= 5)
    <p>#{{$contador}}</p>
    <?php $contador++; ?>
@endwhile


{{--Foreach--}}
<p>Foreach</p>
@foreach($frutas as $fruta)
    <p> - {{$fruta}}</p>
@endforeach