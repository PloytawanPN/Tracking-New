<?php

namespace App\Livewire\Pets;

use Crypt;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Session;
use Str;
class SecordRegister extends Component
{
    use WithFileUploads;

    public $HAccount, $image_owner;

    public $old_image;

    public $email, $password, $fullname, $nickname, $phoneNumber, $address;

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
        if ($step2) {
            $step2['status'] = false;
            if ($step2) {
                $this->old_image = $step2['own_image'];
                $this->email = $step2['own_email'];
                $this->password = $step2['own_password'];
                $this->HAccount = $step2['own_check'];
                $this->fullname = $step2['own_fullname'];
                $this->nickname = $step2['own_nickname'];
                $this->phoneNumber = $step2['own_phone'];
                $this->address = $step2['own_address'];
            }
            Session::put('RegisterPet_2', $step2);
        }
    }

    public function back_step()
    {
        $oldSession = Session::get('RegisterPet_1');
        $oldSession['status'] = false;
        Session::put('RegisterPet_1', $oldSession);
        return redirect()->route('register.pet.1');
    }

    public function next_to_step3()
    {
        try {
            if ($this->image_owner == null && $this->old_image == null) {
                $this->validate(
                    [
                        'image_owner' => 'required',
                    ],
                    [
                        'image_owner.required' => __('messages.owner_image.required'),
                    ]
                );
            }

            if ($this->HAccount) {
                $validate_rule = [
                    'email' => 'required|email',//Login
                    'password' => 'required',
                ];
            } else {
                $validate_rule = [
                    'email' => 'required|email',//เช็คซ้ำใน database ด้วย
                    'password' => 'required|string|min:8|regex:/[a-zA-Z]/|regex:/[0-9]/',
                    'fullname' => 'required|string',
                    'nickname' => 'required|string',
                    'phoneNumber' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10',
                    'address' => 'required',
                ];
            }


            $this->validate($validate_rule, [
                'image_owner.required' => __('messages.owner_image.required'),
                'email.required' => __('messages.user_email.required'),
                'email.email' => __('messages.user_email.email'),
                'password.required' => __('messages.user_password.required'),
                'password.min' => __('messages.password.min'),
                'password.regex' => __('messages.password.latter'),
                'fullname.required' => __('messages.user_fullname.required'),
                'fullname.string' => __('messages.user_fullname.string'),
                'nickname.required' => __('messages.user_nickname.required'),
                'nickname.string' => __('messages.user_nickname.string'),
                'phoneNumber.required' => __('messages.user_phoneNumber.required'),
                'phoneNumber.regex' => __('messages.user_phoneNumber.regex'),
                'phoneNumber.min' => __('messages.user_phoneNumber.min'),
                'phoneNumber.max' => __('messages.user_phoneNumber.max'),
                'address.required' => __('messages.user_address.required'),
            ]);
            if (!$this->image_owner && $this->old_image) {
                $fileName = $this->old_image;
            } else {
                $code = Crypt::decryptString(Session::get('pet-code'));
                $fileName = $code.'_'.time() . '_' . Str::random(20) . '.png';
                $path = $this->image_owner->storeAs('ownerProfile', $fileName, 'public');
            }
            Session::put(
                'RegisterPet_2',
                [
                    'own_image' => $fileName,
                    'own_email' => $this->email,
                    'own_password' => $this->password,
                    'own_check' => $this->HAccount,
                    'own_fullname' => $this->fullname,
                    'own_nickname' => $this->nickname,
                    'own_phone' => $this->phoneNumber,
                    'own_address' => $this->address,
                    'status' => true,
                ]
            );

            return redirect()->route('register.pet.3');
        } catch (\Throwable $th) {
            $this->dispatch('stepFalse', [
                'message' => $th->getMessage(),
            ]);
        }

    }

    public function render()
    {
        return view('livewire.pets.secord-register');
    }
}
