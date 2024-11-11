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
    public function petProfile($code){
        return view('Users.Page.PetProfile',['code'=>$code]);
    }
    public function HealthInfo($code){
        return view('Users.Page.HealthInfo',['code'=>$code]);
    }
    public function VaccinationHistort($code){
        return view('Users.Page.VaccinationHistort',['code'=>$code]);
    }
}
