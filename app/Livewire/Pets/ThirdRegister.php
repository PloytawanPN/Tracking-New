<?php

namespace App\Livewire\Pets;

use Livewire\Component;
use Illuminate\Support\Facades\Session;

class ThirdRegister extends Component
{
    public $spayed, $Health;

    public function mount()
    {
        $checkCode = Session::get('pet-code');
        if(!$checkCode){
            return redirect()->route('error_code');
        }

        $step1 = Session::get('RegisterPet_1');
        if (!$step1||$step1['status'] == false) {
            return redirect()->route('register.pet.1');
        }
        $step2 = Session::get('RegisterPet_2');
        if (!$step2||$step2['status'] == false) {
            return redirect()->route('register.pet.2');
        }

        $step3 = Session::get('RegisterPet_3');
        if ($step3) {
            $this->spayed = $step3['spayed'];
            $this->Health = $step3['Health'];
            $step3['status'] = false;
            Session::put('RegisterPet_3', $step3);
        }

    }

    public function next_to_step3()
    {
        try {
            $this->validate([
                'spayed' => 'required',
            ], [
                'spayed.required' => __('messages.spayed_status'),
            ]);
            Session::put(
                'RegisterPet_3',
                [
                    'spayed' => $this->spayed,
                    'Health' => $this->Health,
                    'status' => true,
                ]
            );
            return redirect()->route('register.pet.4');
        } catch (\Throwable $th) {
            $this->dispatch('stepFalse', [
                'message' => $th->getMessage(),
            ]);
        }
    }

    public function back_step()
    {
        $oldSession = Session::get('RegisterPet_2');
        $oldSession['status'] = false;
        Session::put('RegisterPet_2', $oldSession);
        return redirect()->route('register.pet.2');
    }



    public function render()
    {
        return view('livewire.pets.third-register');
    }
}
