<?php

namespace App\Livewire\Users\Page;

use App\Models\PetTreatment;
use Crypt;
use Livewire\Component;
use Session;

class MidicalHistoryCreate extends Component
{
    public $code,$diagosis,$provided,$medication,$date;

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
                'diagosis' => 'required',
                'provided' => 'required',
                'date' => 'required',
            ], [
                'diagosis.required' => __('messages.please_enter_diagnosis'),
                'provided.required' => __('messages.please_enter_treatment_provided'),
                'date.required' => __('messages.please_enter_treatment_date')
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
            PetTreatment::create([
                'pet_code' => $this->code,
                'diagnosis' => $this->diagosis,
                'treatment' => $this->provided,
                'medications' => $this->medication,
                'treatment_date' => $this->date,
            ]);
            return redirect()->route('MedicalHistory.petSetting', ['code' => Session::get('pet-code')])->with('success', __('messages.operation_success'));
        } catch (\Throwable $th) {
            $this->dispatch('False', [
                'message' => $th->getMessage(),
            ]);
        }
    } 
    public function render()
    {
        return view('livewire.users.page.midical-history-create');
    }
}
 