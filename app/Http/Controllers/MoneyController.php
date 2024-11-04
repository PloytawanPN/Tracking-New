<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MoneyController extends Controller
{
    public function expenses_list(){
        return view('Admin.Expenses.List');
    }
}
