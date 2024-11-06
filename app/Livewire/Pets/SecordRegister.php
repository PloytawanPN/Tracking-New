<?php

namespace App\Livewire\Pets;

use Livewire\Component;

class SecordRegister extends Component
{
    public $HAccount,$image_owner;
    public function render()
    {
        return view('livewire.pets.secord-register');
    }
}
