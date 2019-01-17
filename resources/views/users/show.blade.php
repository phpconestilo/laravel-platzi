@extends('layouts.app')

@section('content')

<div class="mt-5">
    <h1>Perfil de: <strong>{{ $user->name }}</strong></h1>
    <p>Socio activo en la plataforma {{ config('app.name', 'Laragon') }}</p>
    
    {{--Mostrar un boton dentro de un formulario para decirle a la aplicación
        que este usuario autenticado quiere seguir a este usuario en particular--}}
    <form action="/{{ $user->username }}/follow" method="POST">
        {{ csrf_field() }}
        <button class="btn btn-primary">Follow [Seguir]</button>
    </form>

    @if(session('success'))
        <div class="text-success">{{ session('success')}}</div>
    @endif

    <div class="row">
        {{-- 
            Acceder a los mensajes de este usuario
            Verificar la relacion de hasMany en el modelo User 
        --}}
        @foreach ($user->messages as $message)
            <div class="col-3">
                @include('messages.partial_message')
            </div>
        @endforeach

        {{--@foreach ($messages as $message)
            <div class="col-3">
                @include('messages.partial_message')
            </div>
        @endforeach
        {{ $messages->links() --}}
    </div>
</div>

@endsection