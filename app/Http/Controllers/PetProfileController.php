<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PetProfileController extends Controller
{
    public function profile($code){
        return view('Pets.PetProfile',['code'=>$code]);
    }
    public function owner($code){
        return view('Pets.OwnerProfile',['code'=>$code]);
    }

    public function healthInfo($code){
        return view('Pets.HealthInfo',['code'=>$code]);
    }
}
