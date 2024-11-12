<?php

namespace App\Livewire\Users\Page;

use App\Models\Allergy;
use Crypt;
use Livewire\Component;
use Session; 

class AllergiesCreate extends Component
{
    public $code,$allergy,$symptoms;

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
                'allergy' => 'required',
                'symptoms' => 'required'
            ], [
                'allergy.required' => __('messages.allergy_name_required'),
                'symptoms.required' => __('messages.symptoms_required')
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
            Allergy::create([
                'pet_code' => $this->code,
                'allergy_name' => $this->allergy,
                'symptoms' => $this->symptoms,
            ]);
            return redirect()->route('AllergiesHistory.petSetting', ['code' => Session::get('pet-code')])->with('success', __('messages.operation_success'));
        } catch (\Throwable $th) {
            $this->dispatch('False', [
                'message' => $th->getMessage(),
            ]);
        }
    }
    public function render()
    {
        return view('livewire.users.page.allergies-create');
    }
}
