@extends('layouts.app')



@section('content')

<h1 class="h3">Mensaje id: {{ $message->id }}</h1>
@include('messages.partial_message')

@endsection