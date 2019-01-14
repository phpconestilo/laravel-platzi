<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $teacher = 'Alejandro González Reyes';
        $links = [
            'http://platzi.com' => 'Platzi',
            'http://laravel.com' => 'Laravel',
            'http://php.net' => 'PHP'
        ];

        return view('welcome', [
            'teacher' => $teacher,
            'links' => $links,
        ]);
    }

    public function about()
    {
        return view('about');
    }
}
