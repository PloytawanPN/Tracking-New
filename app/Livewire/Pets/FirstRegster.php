<?php

namespace App\Livewire\Pets;

use Livewire\Component;
use Livewire\WithFileUploads;


class FirstRegster extends Component
{
    use WithFileUploads;

    public $image;
    public $species, $name, $breed, $gender, $birthday, $color, $lat, $lng;
    public $step=1;
    protected $listeners = ['next_to_step2'];



    public function next_to_step2($lat, $lng)
    {
        $this->lat = $lat;
        $this->lng = $lng;
        /* $this->step= 2 ; */
        /* dd($this->birthday, $this->lat, $this->lng); */
    }

    public function render()
    {

        return view('livewire.pets.first-regster');
    }
}
