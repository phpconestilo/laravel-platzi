<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     * 
     * Paso 1
     * Se genera una migración para modificar la tabla users, cuyo cambio sea el
     * agregar dos nuevos campos, username y avatar
     * php artisan make:migration add_username_and_avatar_to_table_users --table users
     * 
     * Paso 2
     * Correr dicha migración migración
     * php artisan migrate
     * 
     * Paso 3
     * En este caso se agrega otro campo a asignar masivamente en el modelo User y es el 
     * username del usuario registrado
     * 
     * Paso 4
     * Modificar la vista de registro de usuarios y agregar los campos de
     * formulario necesarios para agregar dicha información en la base de datos
     * 
     * Paso 5
     * Ir al controlador de registro de usuarios Auth para indicarle a Eloquent
     * que agregue dicha información y que se validará de dicha información
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Este usuario tiene muchos mensajes asociados a su cuenta
     * 
     * lo que indica que el modelo Message tiene un campo foraneo
     * llamado user_id que se relaciona con el campo id de este modelo (User)
     */
    public function messages()
    {
        //return $this->hasMany(Message::class);

        //ordenar los datos por fecha de creación en forma decreciente
        //del mas reciente al mas antigüo
        return $this->hasMany(Message::class)->orderBy('created_at', 'desc');
    }
}
