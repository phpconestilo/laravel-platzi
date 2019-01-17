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
        //Reutilizando la vista
        return view('users.follows', [
            'user' => $user,
            'follows' => $user->follows,
            'message' => 'Este usuario sigue a...',
        ]);
    }

    /**
     * Método para saber quiénes siguen a este usuario declarado en la url 
     */
    public function followed($username)
    {
        $user = $this->getByUsername($username);
        //Reutilizando la vista, en follows a una le mando los seguidos
        //y en la otra le mando los seguidores
        return view('users.follows', [
            'user' => $user,
            'follows' => $user->followers,
            'message' => 'Este usuario lo siguen las siguientes personas...',
        ]);
    }


    public function follow($username, Request $request)
    {
        //Buscamos al usuario que queremos seguir
        $user = $this->getByUsername($username);
        //Ahora me localizo a mi
        $me = $request->user();
        //Impide que el usuario autenticado se siga a si mismo. (no causa error, pero es ilógico)
        if($user->id != $me->id) {
            //Yo ahora sego a el usuario buscado
            //Se usa la relación muchos a muchos donde yo (user_id) soy el principal
            //$me->follows()->attach($user);
            $me->follows()->syncWithoutDetaching($user);
            
            return redirect()->back()->withSuccess('Usuario seguido satisfacotiramente');
        }else{
            //Esta parte ya no la necesito, debido a que la lógica fue implementada en
            //en la vista para no mostrar el boton
            return redirect()->back()->with('error', 'Usted no puede autoseguirse...');
        }
        
    }

    public function unfollow($username, Request $request)
    {
        $user = $this->getByUsername($username);
        $me = $request->user();
        $me->follows()->detach($user);

        return redirect()->back()->withSuccess('Usted dejó de seguir a este usuario');
    }

    /**
     * Método privado de utilidad para buscar usuarios por su username
     */
    private function getByUsername($username)
    {
        return User::where('username', $username)->first();
    }

}
