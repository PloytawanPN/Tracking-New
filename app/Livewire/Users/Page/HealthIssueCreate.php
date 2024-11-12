<?php

namespace App\Livewire\Users\Page;

use App\Models\PetDisease;
use Crypt;
use Livewire\Component;
use Session;

class HealthIssueCreate extends Component
{
    public $code, $disease_name, $disease_date;
    protected $listeners = ['confirm'];

    public function mount($code)
    {
        try {
            $this->code = Crypt::decrypt($code);
        } catch (\Throwable $th) { 
            return redirect()->route('notFound.user');
        }
    }

    public function save()
    {
        try {
            $this->validate([
                'disease_name' => 'required',
                'disease_date' => 'required'
            ], [
                'disease_name.required' => __('messages.disease_name.required'),
                'disease_date.required' => __('messages.disease_date.required')
            ]);
            $this->dispatch('Confirm', [
                'message' => __('messages.confirmation_prompt_mg'),
                'method' => 'confirm',
            ]);
        } catch (\Throwable $th) {
            $this->dispatch('False', [
                'message' => $th->getMessage(),
            ]);
        }
    }
    public function confirm()
    {
        try {
            PetDisease::create([
                'pet_code' => $this->code,
                'disease_name' => $this->disease_name,
                'date_diagnosed' => $this->disease_date,
            ]);
            return redirect()->route('HealthIssuesHistort.petSetting', ['code' => Session::get('pet-code')])->with('success', __('messages.operation_success'));
        } catch (\Throwable $th) {
            $this->dispatch('False', [
                'message' => $th->getMessage(),
            ]);
        }
    }
    public function render()
    {
        return view('livewire.users.page.health-issue-create'); 
    }
}
