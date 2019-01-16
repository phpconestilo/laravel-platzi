<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Http\Requests\CreateMessageRequest;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    
    public function show(Message $message)
    {
        return view('messages.show', compact('message'));
    }

    /**
     * Para validaciones mediante FormRequest es necesario pasar el objeto request
     * de la clase Request personalizada
     */
    public function create(CreateMessageRequest $request)
    {
        
        /** 
         * Accedemos a la información del usuario actualmente autenticado
         * lo podemos indicar mediante el metodo middlewate en el archivo de rutas
         * o en el constructor de este controlador
         * 
         * Por tanto, es importante que este controlador
         * este disponible solo para usuarios que han inciado sesión
         * 
         * Opciones alternas a esto son...
         * 
         * Get the currently authenticated user's ID...
         * $id = Auth::id();
         * 
         * Get the currently authenticated user
         * $user = Auth::user();
         * 
         */
        $user = $request->user();

        $message = Message::create([
            'content' => $request->input('message'),
            'image' => 'http://lorempixel.com/600/338?'.mt_rand(0, 1000),
            'user_id' => $user->id,
        ]);

        return redirect('/messages/'.$message->id);
    }
}
