<?php

namespace App\Livewire\Users;

use App\Models\Owner;
use Hash;
use Livewire\Component;

class ChangePassword extends Component
{
    public $token, $confirm, $password;

    public $user;

    public function mount($token)
    {
        $this->token = $token;
        $this->user = Owner::where('remember_token', $this->token)->first();
        if (!$this->user) {
            return redirect()->route('tokenError.user');
        }
    }

    public function changePassword()
    {
        try {
            $this->validate([
                'password' => 'required|string|min:8|regex:/[a-zA-Z]/|regex:/[0-9]/',
                'confirm' => 'required|same:password',
            ], [
                'password.required' => __('messages.user_password.required'),
                'password.min' => __('messages.password.min'),
                'password.regex' => __('messages.password.latter'),
                'confirm.required' => __('messages.confirm_password.required'),
                'confirm.same' => __('messages.confirm_password.same'),
            ]);
            $password = Hash::make($this->password);
            Owner::where('remember_token', $this->token)->update(['password' => $password,'remember_token' => null]);
            return redirect()->route('changeSuccess.user');
        } catch (\Throwable $th) {
            $this->dispatch('False', [
                'message' => $th->getMessage(),
            ]);
        }
    }
    public function render()
    {
        return view('livewire.users.change-password');
    }
}
