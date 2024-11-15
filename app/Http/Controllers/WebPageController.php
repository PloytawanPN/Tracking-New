<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebPageController extends Controller
{
    public function How_to_register(){
        return view('WebPage.RegisterStep');
    }
}
