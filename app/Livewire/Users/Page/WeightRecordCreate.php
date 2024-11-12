<?php

namespace App\Livewire\Users\Page;

use App\Models\PetWeight;
use Crypt;
use Livewire\Component;
use Carbon\Carbon;
use Session;

class WeightRecordCreate extends Component
{
    public $code,$weight,$date;
    protected $listeners = ['confirm'];

    public function mount($code)
    {
        try {
            $this->code = Crypt::decrypt($code);
            $this->date = Carbon::now()->format('Y-m-d');
        } catch (\Throwable $th) { 
            return redirect()->route('notFound.user');
        }
    }

    public function save()
    {
        try {
            $this->validate([
                'weight' => 'required|numeric',
                'date' => 'required'
            ], [
                'weight.required' => __('messages.enter_weight'),
                'weight.numeric' => __('messages.weight_numeric'),
                'date.required' => __('messages.please_measurement_date')
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
            PetWeight::create([
                'pet_code' => $this->code,
                'weight' => $this->weight,
                'measurement_date' => $this->date,
            ]);
            return redirect()->route('WeightRecord.petSetting', ['code' => Session::get('pet-code')])->with('success', __('messages.operation_success'));
        } catch (\Throwable $th) {
            $this->dispatch('False', [
                'message' => $th->getMessage(),
            ]);
        }
    } 
    public function render()
    {
        return view('livewire.users.page.weight-record-create');
    }
}
