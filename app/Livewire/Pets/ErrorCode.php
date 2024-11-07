<?php

namespace App\Livewire\Pets;

use Livewire\Component;

class ErrorCode extends Component
{
    public function go_login(){
        return redirect()->route("login.user");
    }
    public function render()
    {
        return view('livewire.pets.error-code');
    }
}
