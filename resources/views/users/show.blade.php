@extends('layouts.app')

@section('content')

<div class="mt-5">
    <h1>Perfil de: <strong>{{ $user->name }}</strong></h1>
    <p>Socio activo en la plataforma {{ config('app.name', 'Laragon') }}</p>
    
    <a href="/{{ $user->username }}/follows" class="btn btn-link">Sigue a <span class="badge badge-primary">{{ $user->follows->count() }}</span></a>
    <a href="/{{ $user->username }}/followed" class="btn btn-link">Lo siguen <span class="badge badge-primary">{{ $user->followers->count() }}</span></a>

    {{-- Mostrar esta información siempre y cuando el usuario se encuentre autenticado
        en la aplicación --}}
    @if(Auth::check())
        {{-- Verificar si el usuario autenticado ya sigue a este usuario
            si es así mostrar el boton de dejar de seguir,
            en caso contrario
            mostrar el boton de seguir--}}
        @if(Auth::user()->isFollowing($user))
            <form action="/{{ $user->username }}/unfollow" method="POST">
                {{ csrf_field() }}
                <button class="btn btn-danger">unFollow [Dejar de Seguir]</button>
            </form>

            @if(session('success'))
                <div class="text-success">{{ session('success')}}</div>
            @endif
        {{-- Si el id del usuario autenticado difiere del id del perfil de usuario actualmente consultado
            muesto el boton de seguir--}}
        @elseif(Auth::id() != $user->id)
            <form action="/{{ $user->username }}/follow" method="POST">
                {{ csrf_field() }}
                <button class="btn btn-primary">Follow [Seguir]</button>
            </form>

            @if(session('success'))
                <div class="text-success">{{ session('success')}}</div>
            @endif
        @else
            {{-- En este caso se trata del mismo usuario, evitamos que se siga a si mismo--}}
            <div class="text-default">Tu contenido es el siguiente</div>
        @endif
    @endif

    <div class="row mt-4">
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