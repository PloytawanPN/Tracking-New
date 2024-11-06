<?php

namespace App\Livewire\Pets;

use Livewire\Component;
use Livewire\WithFileUploads;


class FirstRegster extends Component
{
    use WithFileUploads;

    public $image;
    public $species, $name, $breed, $gender, $birthday, $color, $lat, $lng;

    public $image_owner, $HAccount;
    protected $listeners = ['next_to_step2'];

    public function next_to_step2($lat, $lng)
    {
        $this->lat = $lat;
        $this->lng = $lng;
    }

    public function render()
    {

        return view('livewire.pets.first-regster');
    }
}
