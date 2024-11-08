<?php

namespace App\Livewire\Pets;

use App\Models\Owner;
use App\Models\Pet;
use App\Models\PetHealthRecord;
use Crypt;
use Hash;
use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class FourthRegister extends Component
{
    public $care, $emergency;

    public function mount()
    {
        $checkCode = Session::get('pet-code');
        if (!$checkCode) {
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

            $code = Crypt::decrypt(Session::get('pet-code'));
            $step1 = Session::get('RegisterPet_1');
            $step2 = Session::get('RegisterPet_2');
            $step3 = Session::get('RegisterPet_3');
            $step4 = Session::get('RegisterPet_4');

            if ($step2['own_check'] == false) {
                $owner = Owner::create([
                    'email' => $step2['own_email'],
                    'password' => Hash::make($step2['own_password']),
                    'fullname' => $step2['own_fullname'],
                    'nickname' => $step2['own_nickname'],
                    'contact' => $step2['own_phone'],
                    'address' => $step2['own_address'],
                    'owner_image' => $step2['own_image'],
                ]);
                $ownerId = $owner->id;
            } else {
                $owner = Owner::where('email', $step2['own_email'])->first();
                $ownerId = $owner->id;
            }
            $pet = Pet::create([
                'pet_code' => $code,
                'owner_id' => $ownerId,
                'pet_image' => $step1['pet_image'],
                'pet_name' => $step1['pet_name'],
                'pet_type' => $step1['pet_species'],
                'species_other' => $step1['species_other'],
                'pet_breed' => $step1['pet_breed'],
                'pet_gender' => $step1['pet_gender'],
                'pet_birthday' => $step1['pet_birthday'],
                'pet_colorMark' => $step1['pet_color'],
                'pet_lat' => $step1['lat'],
                'pet_lng' => $step1['lng'],
                'emergency_contact' => $step4['emergency'],
            ]);
            $health = PetHealthRecord::create([
                'pet_code' => $code,
                'neutered_status' => $step3['spayed'],
                'health_allergies' => $step3['Health'],
                'care_instruction' => $step4['care'],
            ]);

            $file_1 = Session::get('RegisterPet_1')['pet_image'];
            $file_2 = Session::get('RegisterPet_2')['own_image'];

            $oldPath_1 = 'petProfile/' . $code . '/' . $file_1;
            $oldPath_2 = 'ownProfile/' . $code . '/' . $file_2;

            $newPath_1 = 'ProfileImage/Pets/' . $file_1;
            $newPath_2 = 'ProfileImage/Owns/' . $file_2;
            if (Storage::disk('public')->exists($oldPath_1)) {
                Storage::disk('public')->move($oldPath_1, $newPath_1);
            }
            if (Storage::disk('public')->exists($oldPath_2)) {
                Storage::disk('public')->move($oldPath_2, $newPath_2);
            }

            Storage::disk('public')->deleteDirectory('petProfile/' . $code);
            Storage::disk('public')->deleteDirectory('ownProfile/' . $code);

            Session::forget('RegisterPet_1');
            Session::forget('RegisterPet_2');
            Session::forget('RegisterPet_3');
            Session::forget('RegisterPet_4');
            Session::forget('pet-code');

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
