<?php

namespace App\Livewire\Users\Page;

use App\Models\Pet;
use App\Models\PetWeight;
use Crypt;
use Livewire\Component;
use Session;

class WeightRecord extends Component
{
    public $code, $search,$pet_age, $removeID;
    protected $listeners = ['confirmRemove']; 
    public function mount($code) 
    { 
        try {
            $this->code = Crypt::decrypt($code);
            $this->petInfo = Pet::where('pet_code', $this->code)->first();
            if (!$this->petInfo) {
                return redirect()->route('notFound.user');
            }
            $this->pet_age = (Pet::where('pet_code', $this->code)->first())->pet_birthday;
        } catch (\Throwable $th) {
            return redirect()->route('notFound.user');
        }
    }

    public function remove($id)
    {
        $this->removeID = $id;
        $this->dispatch('Confirm', [
            'message' => __('messages.confirmRemove'),
            'method' => 'confirmRemove',
        ]);
    }
    public function confirmRemove()
    {
        try {
            PetWeight::where('id',$this->removeID)->delete();
            return redirect()->route('WeightRecord.petSetting', ['code' => Session::get('pet-code')])->with('success', __('messages.operation_success'));
        } catch (\Throwable $th) {
            $this->dispatch('False', [
                'message' => $th->getMessage(),
            ]);
        }
    }
    public function render()
    {
        $query = PetWeight::where('pet_code', $this->code)->orderBy('measurement_date', 'desc');
        if ($this->search) {
            $query->where('weight', 'like', '%' . $this->search . '%');
        }
        $dataList = $query->get();
        return view('livewire.users.page.weight-record',['dataList'=>$dataList]);
    }
}
 