<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAccountController extends Controller
{
    public function portal(){
        return view('Users.Page.Portal');
    }
    public function profile(){
        return view('Users.Page.Profile');
    }
}
