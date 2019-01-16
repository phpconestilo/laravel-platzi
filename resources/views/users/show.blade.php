@extends('layouts.app')

@section('content')

<div class="mt-5">
    <h1>Perfil de: <strong>{{ $user->name }}</strong></h1>
    <p>Socio activo en la plataforma {{ config('app.name', 'Laragon') }}</p>

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