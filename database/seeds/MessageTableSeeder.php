<?php

use Illuminate\Database\Seeder;
use App\Message;

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
        factory(Message::class, 80)->create();
    }
}
