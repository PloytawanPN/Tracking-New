<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductionController extends Controller
{
    public function create(){
        return view(view: 'Admin.Production.Create');
    }
}
