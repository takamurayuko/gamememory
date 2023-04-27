<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //トップページに繋がる
     public function index()
    {
        return view('user.index');
    }
    
}
