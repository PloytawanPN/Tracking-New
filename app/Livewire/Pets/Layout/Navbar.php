<?php

namespace App\Livewire\Pets\Layout;

use Livewire\Component;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Navbar extends Component
{
    public $lang, $status, $code;

    public function mount($status = null)
    {
        $this->code = Session::get('profileCode');
        $this->status = $status;
        $currentLocale = Session::get('trackingProLang');
        if ($currentLocale) {
            if ($currentLocale == 'en') {
                $this->lang = false;
            } elseif ($currentLocale == 'th') {
                $this->lang = true;
            }
        } else {
            $currentLocale = App::getLocale();
            if ($currentLocale == 'en') {
                $this->lang = false;
            } elseif ($currentLocale == 'th') {
                $this->lang = true;
            }
        }
    }
    public function logout()
    {
        Session::forget('ownerID');
        return redirect()->route('login.user');
    }
    public function changelang()
    {
        if ($this->lang) {
            Session::put('trackingProLang', 'th');
            App::setLocale('th');
        } else {
            Session::put('trackingProLang', 'en');
            App::setLocale('en');
        }

        return redirect(url()->previous());
    }
    public function render()
    {
        return view('livewire.pets.layout.navbar');
    }
}
