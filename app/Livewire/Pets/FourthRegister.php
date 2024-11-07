<?php

namespace App\Livewire\Pets;

use Crypt;
use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class FourthRegister extends Component
{
    public $care, $emergency;

    public function mount()
    {
        $checkCode = Session::get('pet-code');
        if(!$checkCode){
            return redirect()->route('error_code');
        }

        $step1 = Session::get(key: 'RegisterPet_1');
        if (!$step1 || $step1['status'] == false) {
            return redirect()->route('register.pet.1');
        }
        $step2 = Session::get('RegisterPet_2');
        if (!$step2 || $step2['status'] == false) {
            return redirect()->route('register.pet.2');
        }

        $step3 = Session::get('RegisterPet_3');
        if (!$step3 || $step3['status'] == false) {
            return redirect()->route('register.pet.3');
        }

        $step4 = Session::get('RegisterPet_4');
        if ($step4) {
            $this->care = $step4['care'];
            $this->emergency = $step4['emergency'];
            $step4['status'] = false;
            Session::put('RegisterPet_4', $step4);
        }

    }

    public function submit()
    {
        try {
            Session::put('RegisterPet_4', [
                'care' => $this->care,
                'emergency' => $this->emergency,
                'status' => true,
            ]);


            $this->dispatch('confirmAlert');
        } catch (\Throwable $th) {
            $this->dispatch('stepFalse', [
                'message' => __('messages.error_occurred'),
            ]);
        }

    }
    public function confirm()
    {
        try {
            /* $oldPath_1 = 'petsProfile/1730953253_iU6MnIeE1nyOhZilk37M.png';
            $newPath_1 = 'newFolder/1730953253_iU6MnIeE1nyOhZilk37M.png';
            if (Storage::disk('public')->exists($oldPath_1)) {
                Storage::disk('public')->move($oldPath_1, $newPath_1);
            } */

            $code = Crypt::decryptString(Session::get('pet-code'));
            $files_1 = Storage::disk('public')->files('ownerProfile/');
            $files_2 = Storage::disk('public')->files('petsProfile/');
            foreach ($files_1 as $file) {
                if (strpos(basename($file), $code) === 0) {
                    Storage::disk('public')->delete($file);
                }
            }
            foreach ($files_2 as $file) {
                if (strpos(basename($file), $code) === 0) {
                    Storage::disk('public')->delete($file);
                }
            }

            /* Session::forget('RegisterPet_1');
            Session::forget('RegisterPet_2');
            Session::forget('RegisterPet_3');
            Session::forget('RegisterPet_4');
            Session::forget('pet-code'); */

            return redirect()->route('register.pet.success');
        } catch (\Throwable $th) {
            $this->dispatch('stepFalse', [
                'message' => __('messages.error_occurred'),
            ]);
        }
    }

    public function back_step()
    {
        $oldSession = Session::get('RegisterPet_3');
        $oldSession['status'] = false;
        Session::put('RegisterPet_3', $oldSession);
        return redirect()->route('register.pet.3');
    }


    public function render()
    {
        return view('livewire.pets.fourth-register');
    }
}
