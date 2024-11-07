<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthUserController extends Controller
{
    public function login(){
        return view('Users.Auth.Login');
    }
}
