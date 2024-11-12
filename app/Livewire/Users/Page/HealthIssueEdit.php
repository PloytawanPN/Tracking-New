<?php

namespace App\Livewire\Users\Page;

use App\Models\PetDisease;
use Carbon\Carbon;
use Crypt;
use Livewire\Component;
use Session;

class HealthIssueEdit extends Component
{
    public $code,$id, $disease_name, $disease_date;
    protected $listeners = ['confirm'];
    public function mount($code,$id)
    {
        try {
            $this->code = Crypt::decrypt($code);
            $this->id = $id;
            $this->data = PetDisease::where('id',$this->id)->first();
            $this->disease_name= $this->data->disease_name;
            $this->disease_date= $this->data->date_diagnosed; 
        } catch (\Throwable $th) { 
            return redirect()->route('notFound.user');
        }
    }

    public function save()
    {
        try {
            $this->validate([
                'disease_name' => 'required',
                'disease_date' => 'required'
            ], [
                'disease_name.required' => __('messages.disease_name.required'),
                'disease_date.required' => __('messages.disease_date.required')
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
            PetDisease::where('id',$this->id)->update([
                'disease_name' => $this->disease_name,
                'date_diagnosed' => $this->disease_date?Carbon::parse($this->disease_date)->format('Y-m-d'):null,


            ]);
            return redirect()->route('HealthIssuesHistort.petSetting', ['code' => Session::get('pet-code')])->with('success', __('messages.operation_success'));
        } catch (\Throwable $th) {
            $this->dispatch('False', [
                'message' => $th->getMessage(),
            ]);
        }
    }
    public function render()
    {
        return view('livewire.users.page.health-issue-edit');
    }
}
