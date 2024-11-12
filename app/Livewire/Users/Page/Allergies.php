<?php

namespace App\Livewire\Users\Page;

use App\Models\Allergy;
use App\Models\Pet;
use Crypt;
use Livewire\Component;
use Session;

class Allergies extends Component 
{
    public $code,$search, $removeID;

    protected $listeners = ['confirmRemove'];
    public function mount($code)
    {
        try {
            $this->code = Crypt::decrypt($code);
            $this->petInfo = Pet::where('pet_code', $this->code)->first();
            if (!$this->petInfo) {
                return redirect()->route('notFound.user');
            } 
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
            Allergy::where('id',$this->removeID)->delete();
            return redirect()->route('AllergiesHistory.petSetting', ['code' => Session::get('pet-code')])->with('success', __('messages.operation_success'));
        } catch (\Throwable $th) {
            $this->dispatch('False', [
                'message' => $th->getMessage(),
            ]);
        }
    }
    public function render()
    {
        $query = Allergy::where('pet_code', $this->code)->orderBy('created_at', 'desc');
        if ($this->search) {
            $query->where('allergy_name', 'like', '%' . $this->search . '%');
        }
        $dataList = $query->get();
        return view('livewire.users.page.allergies',['dataList'=>$dataList]);
    }
}
 