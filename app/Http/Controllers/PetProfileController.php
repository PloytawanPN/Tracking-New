<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PetProfileController extends Controller
{
    public function profile(){
        return view('Pets.PetProfile');
    }
    public function owner(){
        return view('Pets.OwnerProfile');
    }

    public function healthInfo(){
        return view('Pets.HealthInfo');
    }
}
