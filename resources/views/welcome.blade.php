@extends('layouts.app')

{{-- 
    Declarar el contenido que se colocará en el bloque
    cedido por el template app.blade.php cuyo
    nombre es content
--}}
@section('content')
    <div class="title m-b-md">
        Laratter by <strong>Platzi</strong>
    </div>

    @isset($teacher)
        <p>Profesor: {{ $teacher }}</p>
    @else
        <p>Profesor por definir</p>
    @endisset

    <div class="links">
        @foreach ($links as $link => $text)
            <a href="{{ $link }}" target="_blank">{{ $text }}</a>
        @endforeach
    </div>
@endsection
                