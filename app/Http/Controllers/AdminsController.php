<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminsController extends Controller
{
    public function AdminsList(){
        return view(view: 'Admin.Admins.AdminsList');
    }
}
