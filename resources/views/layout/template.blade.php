<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Template padre</title>
</head>
<body>

<h1>@yield('title')</h1>
<hr>
@section('header')
    <h2>Template Header</h2>
@show

<hr>
<div class="container">
    @yield('content')
    {{--Referencia de una variable--}}
</div>

<hr>
@section('footer')
    <h2>Template Footer</h2>
@show
{{--Finaliza la section--}}

</body>
</html>