<?php

namespace App\Livewire\Admin\Auth;

use App\Models\User;
use Livewire\Component;
use App\Mail\ChangePassword;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPassword extends Component
{
    public $email;

    public function sendEmail()
    {

        try {
            $this->validate([
                'email' => 'required|email|exists:users,email'
            ]);
            $token = Str::random(20);
            User::where('email', $this->email)->update(['remember_token' => $token]);
            Mail::to($this->email)->send(new ChangePassword($token));
            $this->dispatch('SendEmailSuccess', [
                'message' => 'Send Email successfully!',
            ]);
        } catch (\Throwable $th) {
            $this->dispatch('SendEmailFalse', [
                'message' => $th->getMessage(),
            ]);
        }

    }
    public function render()
    {
        return view('livewire.admin.auth.forgot-password');
    }
}
