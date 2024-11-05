<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PetsController extends Controller
{
    public function registerPet(){
        return view('Pets.FirstRegister');
    }
}
