@if(session('respuestaAccion'))
    <hr>
    {{session('respuestaAccion')}}
    <hr>
@endif

@if(isset($notas))
    <h1>Listando todas las notas de la BD</h1>

    {{--
    $notas es una arreglo []
    --}}
    <ul>
        @foreach ($notas as $nota)
            <li><a href="{{url('notas/' . $nota->id )}}">- {{$nota->title}}</a><br>
                <a href="{{url('notas/actualizar/'.$nota->id)}}">Actualizar nota</a><br>
                <a href="{{url('notas/eliminar/'.$nota->id)}}">Eliminar nota</a>
            </li>
        @endforeach
    </ul>
@endif


@if(isset($notaSola))

    <h1>Nota con ID {{$notaSola->id}}</h1>

    <ul>
        <li>Title: {{$notaSola->title}}</li>
        <li>Description: {{$notaSola->description}}</li>
    </ul>

    <p>
        <a href="{{url('notas')}}">Ver todas las notas</a><br>
        <a href="{{url('notas/actualizar/'.$notaSola->id)}}">Actualizar nota</a><br>
        <a href="{{url('notas/eliminar/'.$notaSola->id)}}">Eliminar nota</a>
    </p>

@endif


@if(isset($opcion))

    <h1>Crea tu nota</h1>
    <form action="{{url('/notas/nueva')}}" method="post">
        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" placeholder="Titulo de la nota">
        </div>

        <div>
            <label for="description">Description:</label>
            <input type="text" name="description" placeholder="Description de la nota">
        </div>

        <div>
            <input type="submit" value="Guardar">
        </div>

    </form>


    <p>
        <a href="{{url('notas')}}">Ver todas las notas</a>
    </p>
@endif


@if(isset($notaActualizar))

    <h1>Actualiza tu nota con id: {{$notaActualizar->id}}</h1>
    <form action="{{url('/notas/actualizar/' . $notaActualizar->id)}}" method="post">
        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" placeholder="Titulo de la nota" value="{{$notaActualizar->title}}">
        </div>

        <div>
            <label for="description">Description:</label>
            <input type="text" name="description" placeholder="Description de la nota"
                   value="{{$notaActualizar->description}}">
        </div>

        <div>
            <input type="submit" value="Guardar">
        </div>

    </form>


    <p>
        <a href="{{url('notas')}}">Ver todas las notas</a>
    </p>
@endif