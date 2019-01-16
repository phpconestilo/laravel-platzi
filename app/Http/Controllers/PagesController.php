<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class PagesController extends Controller
{
    public function home()
    {
        /**
         * Paginamos los resultados devueltos de 10 en 10
         * ordenados por el más reciente
         */
        $messages = Message::latest()->paginate(10);

        return view('welcome', [
            'messages' => $messages,
        ]);
    }
}
