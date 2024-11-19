<?php

namespace App\Livewire\Admin\Auth;

use Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;
    public $error;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function login()
    {
        try {
            $this->validate();
            if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
                return redirect()->route('Dashboard');
            } else {
                $this->dispatch('loginFalse', [
                    'message' => 'Your email or password is incorrect. Please check and try again.',
                ]);
            }
        } catch (\Throwable $th) {
            $this->dispatch('loginFalse', [
                'message' => $th->getMessage(),
            ]);
        }
        


    }
    public function render()
    {
        return view('livewire.admin.auth.login');
    }
}
