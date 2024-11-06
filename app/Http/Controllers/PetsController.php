<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PetsController extends Controller
{
    public function registerPet_1(){
        return view('Pets.FirstRegister');
    }
    public function registerPet_2(){
        return view('Pets.SecordRegister');
    }
    public function registerPet_3(){
        return view('Pets.ThirdRegister');
    }
    public function registerPet_4(){
        return view('Pets.FourthRegister');
    }
    public function registerSuccess(){
        return view('Pets.RegisterSuccess');
    }
}
