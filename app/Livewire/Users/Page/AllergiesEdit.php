<?php

namespace App\Livewire\Users\Page;

use App\Models\Allergy;
use Crypt;
use Livewire\Component;
use Session;

class AllergiesEdit extends Component
{
    public $code, $id, $allergy, $symptoms;
    protected $listeners = ['confirm'];

    public function mount($code, $id)
    {
        try {
            $this->code = Crypt::decrypt($code);
            $this->id = $id;
            $data = Allergy::where('id', $this->id)->first();
            $this->allergy = $data->allergy_name;
            $this->symptoms = $data->symptoms;

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
            Allergy::where('id', $this->id)->update([
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
        return view('livewire.users.page.allergies-edit');
    }
}
