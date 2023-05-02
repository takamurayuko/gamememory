<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //トップページに繋がる
    public function index()
    {
        $games = Game::orderBy('created_at', 'desc')->get();
    
        return view('user.index', compact('games'));
    }
    
}
