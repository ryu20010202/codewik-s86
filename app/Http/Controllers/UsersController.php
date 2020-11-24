<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Resources\Views;

class UsersController extends Controller
{
    public function index()
    {
        $user_name = "code wiki";
        return view('index', compact('user_name'));
    }
}
