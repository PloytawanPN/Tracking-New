<?php

namespace App\Livewire\Pets\Profile;

use Crypt;
use Livewire\Component;
use App\Models\Pet as PetModel;

class Pet extends Component
{
    public $code,$petInfo;

    public function mount($code){
        $this->code = Crypt::decrypt($code);
        $this->petInfo = PetModel::where('pet_code',$this->code)->first();
    }
    public function render()
    {
        return view('livewire.pets.profile.pet');
    }
}
