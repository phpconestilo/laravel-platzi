<?php

use Faker\Generator as Faker;
use App\Message;

/**
 * Paso 1
 * 
 * Primero generamos un ModelFactory mediante el comando de artisan
 * php artisan make:factory ModelnameFactory
 * 
 * Indicamos el nombre del modelo como Modelname::class
 * la línea anterior se puede reemplazar como "App\Modelname"
 * 
 * Internamente colocamos en forma de arreglo asociativo los campos de la tabla
 * y el contenido falso de cada uno de estos mediante la librería $faker
 */
$factory->define(Message::class, function (Faker $faker) {
    return [
        'content'   => $faker->realText(mt_rand(20, 160)),
        'image'     => $faker->imageUrl(600, 338),
        //Campos de fecha aleatorios
        'created_at' => $faker->dateTimeThisDecade,
        'updated_at' => $faker->dateTimeThisDecade,
    ];
});
