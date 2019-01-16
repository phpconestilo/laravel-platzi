<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdColumnToMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Agregar un campo de tipo entero llamado user_id sin signo
         * 
         * Establecer una llave foranea al campo user_id, que haga referencia en
         * el campo id en la tabla users
         * 
         * Todo esto es necesario para indicar que hay una relación entre la tabla
         * usuarios y la tabla mensajes. Es decir, un mensaje le pertenece a un usuario
         * y un usuario puede tener muchis mensajes
         */
        Schema::table('messages', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /**
         * Primero elimino la llave foranea (patron nombretabla_nombrecampo_foreign)
         * 
         * Lugo elimino el campo
         */
        Schema::table('messages', function (Blueprint $table) {
            $table->dropForeign('messages_user_id_foreign');

            $table->dropColumn('user_id');
        });
    }
}
