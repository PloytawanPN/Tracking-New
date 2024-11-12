<?php

namespace App\Livewire\Users\Page;

use App\Models\Pet;
use App\Models\Vaccination;
use Carbon\Carbon;
use Crypt;
use Livewire\Component;
use Session;

class VaccineEdit extends Component
{
    public $code, $id, $data, $vac_name, $vac_date, $next_date;

    protected $listeners = ['confirm'];
    public function mount($code, $id)
    {
        try {
            $this->code = Crypt::decrypt($code);
            $this->id = $id;
            $this->petInfo = Pet::where('pet_code', $this->code)->first();
            if (!$this->petInfo) {
                return redirect()->route('notFound.user');
            }
            $this->data = Vaccination::where('id', $this->id)->first();
            $this->vac_name = $this->data->vaccine_name;
            $this->vac_date = $this->data->vaccination_date;
            $this->next_date = $this->data->next_appointment;

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
            Vaccination::where('id', $this->id)->update([
                'vaccine_name' => $this->vac_name,
                'vaccination_date' => $this->vac_date?Carbon::parse($this->vac_date)->format('Y-m-d'):null,
                'next_appointment' => $this->next_date?Carbon::parse($this->next_date)->format('Y-m-d'):null,
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
        return view('livewire.users.page.vaccine-edit');
    }
}
