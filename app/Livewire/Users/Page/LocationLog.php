<?php

namespace App\Livewire\Users\Page;

use App\Models\QrLocation;
use Crypt;
use Livewire\Component;

class LocationLog extends Component
{
    public $location, $code;
    public function mount($code)
    {
        $this->code = Crypt::decrypt($code);
    }
    public function render()
    {
        $this->location = QrLocation::where('pet_code', $this->code)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('livewire.users.page.location-log');
    }
}
