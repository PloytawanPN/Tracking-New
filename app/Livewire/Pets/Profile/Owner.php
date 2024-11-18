<?php

namespace App\Livewire\Pets\Profile;

use App\Models\CardStyle;
use Crypt;
use App\Models\Pet;
use App\Models\Owner as OwnerModel;
use Livewire\Component;
use Session;

class Owner extends Component
{
    public $code,$petInfo,$OwnerInfo,$style;

    public function mount($code){
        $this->code = Crypt::decrypt($code);
        $this->petInfo = Pet::where('pet_code',$this->code)->first();
        $this->OwnerInfo = OwnerModel::where('id',$this->petInfo->owner_id)->first();
        $this->style = CardStyle::where('pet_code',$this->code)->first();
        Session::put('profileCode',$code);
    }
    public function render()
    {
        return view('livewire.pets.profile.owner'); 
    }
}
