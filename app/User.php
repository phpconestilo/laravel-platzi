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

    public function messages()
    {
        return $this->hasMany(Message::class)->orderBy('created_at', 'desc');
    }

    /**
     * Este usuario sigue a.... muchos usuarios
     */
    public function follows()
    {
        /**
         * Yo usuario identificado como user_id, en la tabla pivote (followers) 
         * sigo a muchos usuarios identificados como followed_id
         */
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'followed_id');
    }

    /**
     * Este usuario es seguido por..... muchos usuarios
     */
    public function followers()
    {
        /**
         * Todos los usuarios en la tabla pivote(followers) identificados
         * por followed_id que tengan mi user_id, (me siguen)...
         */
        return $this->belongsToMany(User::class, 'followers', 'followed_id', 'user_id');
    }

}
