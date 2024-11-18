<?php

namespace App\Livewire\Pets;

use App\Models\Allergy;
use App\Models\CardStyle;
use App\Models\Pet;
use App\Models\PetDisease;
use App\Models\PetHealthRecord;
use App\Models\PetTreatment;
use App\Models\Vaccination;
use Crypt;
use Livewire\Component;
use Session;

class HealthInfo extends Component
{
    public $code,$health,$vaccine,$pet_age,$issue,$allergy,$history,$style;

    public function mount($code){
        $this->code = Crypt::decrypt($code);
        $this->pet_age = (Pet::where('pet_code', $this->code)->first())->pet_birthday;
        $this->health = PetHealthRecord::where('pet_code',$this->code)->first();
        $this->vaccine = Vaccination::where('pet_code',$this->code)->orderBy('vaccination_date','asc')->get();
        $this->issue = PetDisease::where('pet_code',$this->code)->orderBy('date_diagnosed','asc')->get();
        $this->allergy = Allergy::where('pet_code',$this->code)->orderBy('created_at','desc')->get();
        $this->style = CardStyle::where('pet_code',$this->code)->first();
        $this->history = PetTreatment::where('pet_code',$this->code)->orderBy('treatment_date','asc')->get();
        Session::put('profileCode',$code);
    }
    public function render()
    {
        return view('livewire.pets.health-info');
    }
}
