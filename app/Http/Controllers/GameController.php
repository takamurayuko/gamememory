<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
     public function create(Request $request)
    {
        return view('user.create');
    }
}


