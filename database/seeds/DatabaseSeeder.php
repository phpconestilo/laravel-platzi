<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * PASO 3
     * 
     * En tercer lugar se registra el semillero o conjunto de semilleros 
     * dentro de la función run
     * Ahora para generar los registros falsos (activar los semilleros) es necesario dirigirse a la consola
     * y mendiante artisan ejecutar:
     * 
     * php artisan db:seed
     * 
     * o mejor aun, volver a rehacer las tablas y migraciones, asi como sembrar su información correspondiene
     * php artisan migrate:refresh --seed
     * 
     * Si solo queremos ejecutar un seed 
     * php artisan db:seed --class=ProfessionSeeder
     * 
     * 
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(MessageTableSeeder::class);
    }
}
