<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Resources\Views;

class UsersController extends Controller
{
    public function newRegistrationForm(){
        return view('registration');
    }

    public function register(Request $request)
    {
        $this -> validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        $this->guard()->login($user);
        return view();
    }
    //
}
