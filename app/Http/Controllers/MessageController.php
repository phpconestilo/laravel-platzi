<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Http\Requests\CreateMessageRequest;

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

    /**
     * Para validaciones mediante FormRequest es necesario pasar el objeto request
     * de la clase Request personalizada
     */
    public function create(CreateMessageRequest $request)
    {
        /**
         * Todo controlador que extiende de Controller incorpora la propiedad validate
         * que recibe la petición, un array con las reglas de validación
         * y un array tercero opcional con el mensaje a mostrar
         * 
         * Se recomienda crear una clase FormRequest para que sea ella quien se encargue de hacer
         * esta validación y dejar el controlador mas limpio
         */

        /*$this->validate($request, [
            'message' => ['required', 'max:30']
        ], [
            'message.required' => 'Estimado usuario, el mensaje es requerido',
            'message.max' => 'Estimado usuario, el mensaje no debe exceder los 30 caracteres'
        ]);*/


        
        /**
         * Asignación masiva mediante el método create(array) del modelo
         * Para ello es importante declarar en el modelo que propiedades
         * pueden ser asignadas masivamente. En caso de ser información sensible, es
         * mejor proteger las propiedades del modelo ante este mecanismo y emplear
         * el guardado manual mediante new Model (y sus propiedades = algo)
         */
        $message = Message::create([
            'content' => $request->input('message'),
            'image' => 'http://lorempixel.com/600/338?'.mt_rand(0, 1000),
        ]);

        return redirect('/messages/'.$message->id);
    }
}
