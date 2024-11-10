<?php

namespace App\Livewire\Users;

use App\Models\Owner;
use Hash;
use Livewire\Component;
use Illuminate\Support\Facades\Crypt;
use Session;

class Login extends Component
{
    public $email, $password;
    public function login()
    {
        try {
            $this->validate([
                'email' => 'required|email',
                'password' => 'required',
            ], [
                'email.required' => __('messages.please_enter_email'),
                'email.email' => __('messages.invalid_email_format'),
                'password.required' => __('messages.please_enter_password'),
            ]);
            $user = Owner::where('email', $this->email)->first();

            if ($user && Hash::check($this->password, $user->password)) {
                $encryptedId = Crypt::encrypt($user->id);
                Session::put('ownerID', $encryptedId);

                return redirect()->route('portal.user');
            } else {
                $this->dispatch('LoginFalse', [
                    'message' => __('messages.failed'),
                ]);
            }
        } catch (\Throwable $th) {
            $this->dispatch('LoginFalse', [
                'message' => $th->getMessage(),
            ]);
        }

    }
    public function render()
    {
        return view('livewire.users.login');
    }
}
