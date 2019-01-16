<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        /**
         * En esta sección se debe indicar si los nuevos campos agregados en el Modelo User
         * deben ser validados para su posterior almacenamiento en la base de datos
         * 
         */
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            
            //En este caso es requerido, un texto, de máximo de 255 caracteres y unico en la tabla users
            'username' => ['required', 'string', 'max:255', 'unique:users'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        /**
         * En este punto es importante indicar que los nuevos campos agregados al modelo
         * User tambien se deben almacenar en la base de datos cuando
         * estos lleguen desde un formulario.
         * Para ello es importante indicar dentro del Modelo que deben ser asignado de forma masiva
         * dado que el metodo que se usa aqui es ::create
         */
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),

            //Es lo mismo que $data->get() o $data->input()
            'username' => '@'.$data['username'],
            'avatar' => 'http://lorempixel.com/300/300/people?'.random_int(1, 1000),
        ]);
    }
}
