@extends('layouts.app')

{{-- 
    Declarar el contenido que se colocará en el bloque
    cedido por el template app.blade.php cuyo
    nombre es content
--}}
@section('content')
    <div class="jumbotron text-center">
        <h1>Laratter by Platzi</h1>
        <nav>
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a href="/" class="nav-link">Home</a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="row">
        @forelse ($messages as $message)
            <div class="col-6">
                <img src="{{ $message['image'] }}" alt="" class="img-thumbnail">
                <p class="card-text">
                    {{ $message['content'] }} 
                    <a href="/messages/{{ $message['id'] }}">Leér más...</a>
                </p>
            </div>
        @empty
            <p>No hay mensajes destacados.</p>
        @endforelse
    </div>
@endsection
                