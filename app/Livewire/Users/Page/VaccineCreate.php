<?php

namespace App\Livewire\Users\Page;

use App\Models\Vaccination;
use Crypt;
use Livewire\Component;
use Session;

class VaccineCreate extends Component
{
    public $code, $vac_name, $vac_date, $next_date;
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
                'vac_name' => 'required',
                'vac_date' => 'required'
            ], [
                'vac_name.required' => __('messages.vaccine_name_placeholder'),
                'vac_date.required' => __('messages.vaccination_date_placeholder')
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
            Vaccination::create([
                'pet_code' => $this->code,
                'vaccine_name' => $this->vac_name,
                'vaccination_date' => $this->vac_date,
                'next_appointment' => $this->next_date,
            ]);
            return redirect()->route('VaccinationHistort.petSetting', ['code' => Session::get('pet-code')])->with('success', __('messages.operation_success'));
        } catch (\Throwable $th) {
            $this->dispatch('False', [
                'message' => $th->getMessage(),
            ]);
        }
    }
    public function render()
    {
        return view('livewire.users.page.vaccine-create');
    }
}
