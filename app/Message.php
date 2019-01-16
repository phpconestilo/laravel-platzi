<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //Es importante que la usar el metodo create del modelo se especifiquen
    //los campos que se van a llenar de manera masiva
    protected $fillable = ['content', 'image', 'user_id'];

    /**
     * Este Mensaje pertenece a un Usuario
     * $message->user()->name
     * 
     * Al hacer esta relación tenemos acceso total a la información del usuario
     * con quién se le asocia
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
