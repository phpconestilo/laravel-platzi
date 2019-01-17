<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowersTable extends Migration
{
    /**
     * Relaciones muchos a muchos.
     * 
     * Esta migración es para que un usuario siga a muchos usuarios (twitter)
     * y ese usuario pueda ser seguido por otros usuarios
     * 
     * Como el esquema de negocio sería users_users, lo mejor fue llamar a esta
     * tabla followers (seguidores)
     * 
     * Al ser una tabla pivote, no es necesario que tenga un id increment
     * 
     * Al ser un primary compuesto, significa que un mismo usuario no puede seguir dos
     * veces a un mismo usuario
     * No se puede repetir info de user_id y followed_id en mas de un registro
     * 
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('followers', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('followed_id')->unsigned();

            $table->primary(['user_id', 'followed_id']);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('followed_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('followers');
    }
}
