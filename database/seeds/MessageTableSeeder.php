<?php

use Illuminate\Database\Seeder;
use App\Message;
use App\User;

class MessageTableSeeder extends Seeder
{
    /**
     * PASO 2
     * 
     * En segundo lugar se crea un semillero de información mediante el comando artisan
     * php artisan make:seeder ModelnameTableSeeder
     * 
     * Dentto de este se invoca a la función globla factory pasandole como parametro
     * el nombre del modelo, como segundo parametro la cantidad de registros
     * y finalmente se invoca su metodo create para guardar esa
     * información generada dentro de la base de datos
     * 
     * 
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Se crean 10 usuarios, por cada usuario creado se ejecuta
         * una función con el usuario actual y
         * a continuación se crean 20 mensajes, pasando el id del usuario actual 
         */
        factory(User::class, 10)->create()->each(function(User $user){
            factory(Message::class, 20)->create([
                'user_id' => $user->id
            ]);
        });
        
    }
}
