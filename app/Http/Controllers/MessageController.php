<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessageController extends Controller
{
    /*public function show($id)
    {
        //Si no encuentra el recurso, el error se dispara en la vista cuando se trate
        //de acceder a una propiedad de un objeto no existente
        $message = Message::find($id);
        return view('messages.show', compact('message'));
    }*/

    public function show(Message $message)
    {
        //Los Route Model Binding indican a laravel que el parametro pasado a la ruta
        //lo debe vincular con un objeto del Modelo indicado
        //para este caso se entiende que debe buscar un objeto de la clase Message con el id pasado en la ruta  
        //Si no lo encuentra lanza un error 404

        //Es importante aclarar que RouteModelBinding exige que el parametro de ruta y argumento de la función deben concidir en cuanto nombre
        return view('messages.show', compact('message'));
    }

    public function create(Request $request)
    {
        dd($request->all());
    }
}
