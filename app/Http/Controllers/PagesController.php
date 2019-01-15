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
         */
        $messages = Message::paginate(10);

        return view('welcome', [
            'messages' => $messages,
        ]);
    }
}
