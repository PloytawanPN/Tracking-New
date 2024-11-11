<?php

namespace App\Livewire\Users\Page;

use App\Models\Pet;
use Crypt;
use Livewire\Component;
use Session;

class Portal extends Component
{
    public $petList;

    public function mount(){
        $this->ownerID = Crypt::decrypt(Session::get('ownerID'));
        $this->petList = Pet::where('owner_id', $this->ownerID)->get();
    }

    public function redirectProfile($code){
        $cryptCode = Crypt::encrypt($code);
        Session::put('pet-code',$cryptCode);
        return redirect()->route('profile.petSetting',['code'=>$cryptCode]);
    }
    public function render()
    {
        return view('livewire.users.page.portal');
    }
}
