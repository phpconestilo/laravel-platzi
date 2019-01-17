<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function show($username)
    {
        $user = $this->getByUsername($username);
        return view('users.show', compact('user'));
    }

    /**
     * Método para saber a quién sigue este usuario declarado en la url 
     */
    public function follows($username)
    {
        $user = $this->getByUsername($username);
        return view('users.follows', compact('user'));
    }


    public function follow($username, Request $request)
    {
        //Buscamos al usuario que queremos seguir
        $user = $this->getByUsername($username);
        //Ahora me localizo a mi
        $me = $request->user();
        //Yo ahora sego a el usuario buscado
        //Se usa la relación muchos a muchos donde yo (user_id) soy el principal
        //$me->follows()->attach($user);
        $me->follows()->syncWithoutDetaching($user);
        
        return redirect()->back()->withSuccess('Usuario seguido satisfacotiramente');
    }

    /**
     * Método privado de utilidad para buscar usuarios por su username
     */
    private function getByUsername($username)
    {
        return User::where('username', $username)->first();
    }

}
