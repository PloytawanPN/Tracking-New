<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
        return view('Admin.Auth.Login');
    }
    public function forgotPassword(){
        return view('Admin.Auth.ForgotPassword');
    }
}
