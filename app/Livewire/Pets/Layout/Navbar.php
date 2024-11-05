<?php

namespace App\Livewire\Pets\Layout;

use Livewire\Component;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Navbar extends Component
{
    public $lang;

    public function mount()
    {
        $currentLocale = Session::get('trackingProLang');
        if ($currentLocale == 'en') {
            $this->lang = true;
        }else {
            $this->lang = false;
        }
    }
    public function changelang()
    {
        if ($this->lang) {
            Session::put('trackingProLang','en');
            App::setLocale('en');
        } else {
            Session::put('trackingProLang','th');
            App::setLocale('th');
        }
    }
    public function render()
    {
        return view('livewire.pets.layout.navbar');
    }
}
