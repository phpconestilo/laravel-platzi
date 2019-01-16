<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function show($username)
    {
        /**
         * Buscar a un usuario con username igual al pasado como parametro
         * De los resultados me quedo con el primero
         * get() con todos los encontrados
         */
        $user = User::where('username', $username)->first();

        /**
         * En caso de querer mostrar todos los mensajes de este usuario de manera paginada
         * es necesario hacer aqui la consulta
         */
        //$messages = $user->messages()->paginate(5);
        //return view('users.show', compact('user', 'messages'));

        return view('users.show', compact('user'));
    }
}
