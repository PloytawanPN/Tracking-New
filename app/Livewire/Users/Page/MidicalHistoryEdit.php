<?php

namespace App\Livewire\Users\Page;

use App\Models\PetTreatment;
use Crypt;
use Livewire\Component;
use Session;

class MidicalHistoryEdit extends Component 
{
    public $code,$id,$diagosis,$provided,$medication,$date;

    protected $listeners = ['confirm'];
    public function mount($code,$id)
    {
        try {
            $this->code = Crypt::decrypt($code);
            $this->id = $id;
            $data = PetTreatment::where('id',$this->id)->first();
            $this->diagosis=$data->diagnosis;
            $this->provided=$data->treatment;
            $this->medication=$data->medications;
            $this->date=$data->treatment_date;
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
            PetTreatment::where('id',$this->id)->update([
                'diagnosis' => $this->diagosis,
                'treatment' => $this->provided,
                'medications' => $this->medication?$this->medication:null,
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
        return view('livewire.users.page.midical-history-edit');
    }
}
