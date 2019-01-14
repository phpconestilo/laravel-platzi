<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $teacher = 'Alejandro González Reyes';
    $links = [
        'http://platzi.com' => 'Platzi',
        'http://laravel.com' => 'Laravel',
    ];

    return view('welcome', [
        'teacher' => $teacher,
        'links' => $links,
    ]);
});

Route::get('/acerca', function () {
    //return 'Acerca de nosotros';
    return view('about');
});
