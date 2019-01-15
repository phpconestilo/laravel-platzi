<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnUsernameAndAvatarToTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Registramos los nuevos campos a la tabla users
         * username: unico (y a la vez requerido)
         * avatar: puede ser nulo
         */
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->unique();
            $table->string('avatar')->nullable();
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
         * Es importante deshacer esos cambios si en algun momento deseamos
         * hacer un rollback de dicha migración
         */
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('username');
            $table->dropColumn('avatar');
        });
    }
}
