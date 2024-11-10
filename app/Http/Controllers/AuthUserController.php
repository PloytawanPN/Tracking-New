<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthUserController extends Controller
{
    public function login(){
        return view('Users.Auth.Login');
    }
    public function forgotPassword(){
        return view('Users.Auth.ForgotPassword');
    }
    public function changePassword($token){
        return view('Users.Auth.ChangePassword',['token'=>$token]);
    }

    public function tokenError(){
        return view('Users.Auth.tokenError');
    }
    public function sendSuccess(){
        return view('Users.Auth.sendSuccess');
    }
    public function changeSuccess(){
        return view('Users.Auth.changeSuccess');
    }
    public function notFound(){
        return view('Users.Auth.notFound');
    }
}
