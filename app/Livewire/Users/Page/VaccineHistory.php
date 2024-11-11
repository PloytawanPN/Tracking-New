<?php

namespace App\Livewire\Users\Page;

use App\Models\Pet;
use Crypt;
use Livewire\Component;

class VaccineHistory extends Component
{
    public $code;

    public function mount($code)
    {
        try {
            $this->code = Crypt::decrypt($code);
            $this->petInfo = Pet::where('pet_code', $this->code)->first();
            if (!$this->petInfo) {
                return redirect()->route('notFound.user');
            } else {
                
            }
        } catch (\Throwable $th) {
            return redirect()->route('notFound.user');
        }
    }
    public function render()
    {
        return view('livewire.users.page.vaccine-history');
    }
}
