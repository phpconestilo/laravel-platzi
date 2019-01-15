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
        <form action="/messages/create" method="POST">
            <div class="form-group">
                {{ csrf_field() }}
                <input type="text" name="message" class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}" placeholder="¿Qué estas pensando?">
                @if($errors->has('message'))
                    @foreach($errors->get('message') as $error)
                        <div class="invalid-feedback">{{ $error }}</div>
                    @endforeach
                @endif
            </div>
        </form>
    </div>
    <div class="row">
        @forelse ($messages as $message)
            <div class="col-6">
                <img src="{{ $message->image }}" alt="" class="img-thumbnail">
                <p class="card-text">
                    {{ $message->content }} 
                    <a href="/messages/{{ $message->id }}">Leér más...</a>
                </p>
            </div>
        @empty
            <p>No hay mensajes destacados.</p>
        @endforelse

        @if(count($messages))
            <div class="mx-auto mt-5">
                {{-- El método links lo tengo disponible siempre y cuando le indique que los resultads
                    de la busqueda en el Modelo los debe arrojar paginados, de lo contrario
                    este metodo no existe y llamarlo marcaría un error --}}
                {{ $messages->links() }}
            </div>
        @endif
    </div>
@endsection
                