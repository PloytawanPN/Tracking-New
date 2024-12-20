<?php

namespace App\Livewire\Users\Page;

use App\Models\Pet;
use App\Models\Vaccination;
use Carbon\Carbon;
use Crypt;
use Livewire\Component;
use Livewire\WithPagination;
use Session;

class VaccineHistory extends Component
{
 

    public $code, $pet_age, $search, $removeID;

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
            Vaccination::where('id',$this->removeID)->delete();
            return redirect()->route('VaccinationHistort.petSetting', ['code' => Session::get('pet-code')])->with('success', __('messages.operation_success'));
        } catch (\Throwable $th) {
            $this->dispatch('False', [
                'message' => $th->getMessage(),
            ]);
        }
    }
    public function render()
    {
        $vaccineList = Vaccination::where('pet_code', $this->code)->orderBy('vaccination_date', 'asc')->get();

        $query = Vaccination::where('pet_code', $this->code)->orderBy('vaccination_date', 'asc');
        if ($this->search) {
            $query->where('vaccine_name', 'like', '%' . $this->search . '%');
        }
        $vaccineList = $query->get();
        return view('livewire.users.page.vaccine-history', ['vaccineList' => $vaccineList]);
    }
}
