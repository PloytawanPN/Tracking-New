<?php

namespace App\Livewire\Users\Page;

use Livewire\Component;

class StyleSetting extends Component
{
    public $header_color,$button_color;

    public $custom_color;

    public function mount(){
        $this->header_color = '';
        $this->button_color = '';
    }

    public function header_df(){
        $this->header_color = 'Default';
    }
    public function render()
    {
        return view('livewire.users.page.style-setting');
    }
}
