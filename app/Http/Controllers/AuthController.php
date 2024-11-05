<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('Admin.Auth.Login');
    }
    public function forgotPassword()
    {
        return view('Admin.Auth.ForgotPassword');
    }
    public function changePassword($token)
    {
        $user = User::where('remember_token', $token)->exists();
        if ($user) {
            return view('Admin.Auth.ChangePassword',['token'=>$token]);
        } else {
            return view('Admin.Auth.TokenIncorrect');
        }


    }
}
