<?php

namespace App\Livewire\Users;

use App\Mail\ResetPasswordOwnMail;
use App\Models\Owner;
use Livewire\Component;
use Illuminate\Support\Str;
use Mail;

class ForgotPassword extends Component
{
    public $email;
    public function sendEmail()
    {

        try {
            $this->validate([
                'email' => 'required|email',
            ], [
                'email.required' => __('messages.user_email.required'),
                'email.email' => __('messages.user_email.email'),
            ]);
            $user = Owner::where('email', $this->email)->first();
            if ($user) {
                $token = Str::random(20);
                Owner::where('id', $user->id)->update(['remember_token' => $token]);
                Mail::to($this->email)->send(new ResetPasswordOwnMail($token));
                return redirect()->route('sendSuccess.user');
            } else {
                $this->dispatch('False', [
                    'message' => __('messages.email_not_found'),
                ]);
            }
        } catch (\Throwable $th) {
            $this->dispatch('False', [
                'message' => $th->getMessage(),
            ]);
        }

    }
    public function render()
    {
        return view('livewire.users.forgot-password');
    }
}
