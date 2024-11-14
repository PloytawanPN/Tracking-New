<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\qr_codes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class PetsController extends Controller
{
    public function Galyxie($code)
    {
        $encryptedData = Crypt::encrypt($code);
        return redirect()->route('addYourPet', ['code' => $encryptedData]);
    }
    public function addYourPet($code)
    {
        try {
            $decryptedCode = Crypt::decrypt($code);

            $pet = Pet::where('pet_code', $decryptedCode)->get();
            $qrcode = qr_codes::where('pet_code', $decryptedCode)->get();

            if (count($pet) > 0) {
                return redirect()->route('pet.profile', ['code' => $code]);
            } else {
                if (count($qrcode) == 0) {
                    return view('Pets.InvalidCode');
                } else {
                    Session::put('pet-code', $code);
                    return redirect()->route('register.pet.1');
                }
            }
        } catch (\Throwable $th) {
            return view('Pets.InvalidCode');
        }
    }

    public function error_code()
    {
        return view('Pets.ErrorCode');
    }
    public function registerPet_1()
    {
        return view('Pets.FirstRegister');
    }
    public function registerPet_2()
    {
        return view('Pets.SecordRegister');
    }
    public function registerPet_3()
    {
        return view('Pets.ThirdRegister');
    }
    public function registerPet_4()
    {
        return view('Pets.FourthRegister');
    }
    public function registerSuccess()
    {
        return view('Pets.registerSuccess');
    }
}
