<?php

namespace App\Livewire\Pets;

use Livewire\Component;
use Livewire\WithFileUploads;

class FirstRegster extends Component
{
    use WithFileUploads;

    public $image;
    
    public $species;

    public function render()
    {

        return view('livewire.pets.first-regster');
    }
}
