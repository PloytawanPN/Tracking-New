<?php

namespace App\Livewire\Users\Page;

use Crypt;
use Livewire\Component;

class MyQrcode extends Component
{
    public $code;

    public function mount($code){
        $this->code = Crypt::decrypt($code);
    }
    public function render()
    {
        return view('livewire.users.page.my-qrcode');
    }
}
