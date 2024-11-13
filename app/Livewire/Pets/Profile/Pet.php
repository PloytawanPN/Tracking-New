<?php

namespace App\Livewire\Pets\Profile;

use App\Models\QrLocation;
use Crypt;
use Livewire\Component;
use App\Models\Pet as PetModel;
use Session;

class Pet extends Component
{
    public $code, $petInfo;

    protected $listeners = ['savelocation'];

    public function mount($code)
    {
        $this->code = Crypt::decrypt($code);
        $this->petInfo = PetModel::where('pet_code', $this->code)->first();
        Session::put('profileCode',$code);
    }

    public function savelocation($lat, $lng)
    {
        if ($lat == 'error' || $lng == 'error') {
            QrLocation::create([
                'pet_code' => $this->code,
                'qr_lat' => null,
                'qr_lng' => null,
            ]);
        } else {
            QrLocation::create([
                'pet_code' => $this->code,
                'qr_lat' => $lat,
                'qr_lng' => $lng,
            ]);
        }

    }


    public function render()
    {
        return view('livewire.pets.profile.pet');
    }
}
