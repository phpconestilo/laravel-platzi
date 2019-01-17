<?php

use Illuminate\Database\Seeder;
use App\Message;
use App\User;

class MessageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         *Guardamos una colección de 40 usuarios creados en la base de datos
         */
        $users = factory(User::class, 40)->create();
        
        /**
         * Recorremos esa colección de usuarios, y por cada uno de ellos le generamos
         * un total de 20 mensajes a cada uno.
         * 
         * Le damos acceso interno en la función a la variable externa $users
         * use($variable_externa)
         */
        $users->each(function(User $user) use ($users){
            factory(Message::class, 20)->create([
                'user_id' => $user->id
            ]);

            //a este usuario en turno le asigno unos usuarios para que los siga
            //random en una colección devuelve un arreglo con la cantidad de valores asignados
            $user->follows()->sync($users->random(10));
        });
        
    }
}
