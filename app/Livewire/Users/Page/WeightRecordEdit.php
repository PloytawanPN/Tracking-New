<?php

namespace App\Livewire\Users\Page;

use App\Models\PetWeight;
use Carbon\Carbon;
use Crypt;
use Livewire\Component;
use Session;

class WeightRecordEdit extends Component
{
    public $id,$code,$weight,$date;
    protected $listeners = ['confirm'];

    public function mount($code,$id)
    {
        try {
            $this->code = Crypt::decrypt($code);
            $this->id=$id;
            $data = PetWeight::where('id',$this->id)->first();
            $this->weight = $data->weight;
            $this->date = $data->measurement_date;
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
            PetWeight::where('id',$this->id)->update([
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
        return view('livewire.users.page.weight-record-edit');
    }
}
 