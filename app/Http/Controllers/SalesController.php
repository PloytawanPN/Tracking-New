<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function list(){
        return view(view: 'Admin.Sales.List');
    }

    public function view($id){
        return view('Admin.Sales.View', ['id' => $id]);
    }

    public function edit($id){
        return view('Admin.Sales.Edit', ['id' => $id]);
    }

    public function create(){
        return view(view: 'Admin.Sales.Create');
    }
}
