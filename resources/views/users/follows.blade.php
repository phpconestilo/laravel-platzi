@extends('layouts.app')

@section('content')
    <h1 class="mt-2">{{ $user->name }}</h1>
    <p>{{ $message }}</p>
    <ul class="list-unstyled">
        @foreach($follows as $follow)
            <li>{{ $follow->username }}</li>
        @endforeach
    </ul>
@endsection