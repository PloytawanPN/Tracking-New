<?php

namespace App\Livewire\Users\Page;

use App\Models\Pet;
use App\Models\PetHealthRecord;
use Crypt;
use Livewire\Component;
use Request;

class HealtInfo extends Component
{
    public $code,$healthInfo,$neutered,$health_allergies,$care; 

    public function mount($code)
    {
        try {
            $this->code = Crypt::decrypt($code);
            $this->petInfo = Pet::where('pet_code', $this->code)->first();
            if (!$this->petInfo) {
                return redirect()->route('notFound.user');
            } else {
                $this->healthInfo = PetHealthRecord::where('pet_code',$this->code)->first();
                if($this->healthInfo){
                    $this->neutered = $this->healthInfo->neutered_status;
                    $this->health_allergies = $this->healthInfo->health_allergies;
                    $this->care = $this->healthInfo->care_instruction;
                }
            }
        } catch (\Throwable $th) {
            return redirect()->route('notFound.user');
        }
    }

    public function save(){
        try {
            $this->validate([
                'neutered'=>'required',
            ],[
                'neutered.required'=>__('messages.spayed_status')
            ]);
            if($this->healthInfo){
                PetHealthRecord::where('pet_code',$this->code)->update([
                    'neutered_status'=> $this->neutered,
                    'health_allergies'=> $this->health_allergies,
                    'care_instruction'=> $this->care,
                ]);
            }else{
                PetHealthRecord::create([
                    'pet_code' => $this->code,
                    'neutered_status' => $this->neutered,
                    'health_allergies' => $this->health_allergies,
                    'care_instruction' => $this->care,
                ]);
            }
            return redirect(url()->previous())->with('success', __('messages.operation_success'));
        } catch (\Throwable $th) {
            $this->dispatch('False', [
                'message' => $th->getMessage(),
            ]);
        }
    }
    public function render()
    {
        return view('livewire.users.page.healt-info');
    }
}
