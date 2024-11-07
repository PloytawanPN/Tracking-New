<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class PetsController extends Controller
{
    public function addYourPet($code)
    {
        /* $id = 'AA000001';
        $encryptedId = Crypt::encryptString($id);
        dd($encryptedId); */
        $code='eyJpdiI6InBYREwvZ05lbzZBZGd1QjdSQ1MxaFE9PSIsInZhbHVlIjoibUFMMXhadGhMVWM4MVBwNGNiREgyUT09IiwibWFjIjoiNzBhNDM4ZTg4M2ZhNzQzMjA0NTE1MWJiYTExZDAwNjg5Mjg4OGY2ZTgzZmRhMDFhZTg5MmRiMGU2ZWM5Yzc4ZSIsInRhZyI6IiJ9';
        
        Session::put('pet-code',$code);
        //เช็ค pet code ใน database ถ้าไม่มีให้ไปหน้า error

        /* $decryptedId = Crypt::decryptString($code);
        dd($decryptedId); */

        return redirect()->route('register.pet.1');
    }

    public function error_code(){
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
        return view('Pets.RegisterSuccess');
    }
}
