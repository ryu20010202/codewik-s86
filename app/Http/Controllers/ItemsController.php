<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function index(){
        $user_name = "code wiki";
        return view('x', compact('user_name'));
    }
    //
}
