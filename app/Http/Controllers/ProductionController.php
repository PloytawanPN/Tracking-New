<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductionController extends Controller
{
    public function list(){
        return view(view: 'Admin.Production.List');
    }
    public function create(){
        return view(view: 'Admin.Production.Create');
    }
}
