<?php

namespace App\Livewire\Admin\Auth;

use App\Models\User;
use Hash;
use Livewire\Component;

class ChangePassword extends Component
{
    public $password,$confirm,$token;

    public function mount($token){
        $this->token = $token;
    }
    public function changePassword(){
        try {
            $this->validate([
                'password' => 'required|min:8',
                'confirm' => 'required|same:password',
            ]);
            User::where('remember_token',$this->token)->update([
                'password'=>Hash::make($this->password),
                'remember_token'=>null,
            ]);
            $this->dispatch('success', [
                'message' => 'Change password successfully!',
            ]);
        } catch (\Throwable $th) {
            $this->dispatch('false', [
                'message' => $th->getMessage(),
            ]);
        }
    }
    public function render()
    {
        return view('livewire.admin.auth.change-password');
    }
}
