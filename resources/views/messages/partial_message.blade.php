{{-- Los parciales son archivos que no se extienden, sino se incluyen
    como trozos de información complementaria en zonas de otras vistas
    
    @include('partial
') --}}
<img src="{{ $message->image }}" alt="" class="img-thumbnail">
<p class="card-text">
    <div class="text-muted">Escrito por <a href="/{{ $message->user->username }}">{{ $message->user->name}}</a></div>
    {{ $message->content }} 
    <a href="/messages/{{ $message->id }}">Leér más...</a>
</p>