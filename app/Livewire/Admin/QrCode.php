<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class QrCode extends Component
{
    public $numberOfQRCodes;

    public function createQrCodes()
    {
        try {
            $this->validate([
                'numberOfQRCodes' => 'required|integer|min:1',
            ]);   
            
            

            $this->numberOfQRCodes = null;
            $this->dispatch('qrCodesCreated', [
                'message' => 'QR Code(s) created successfully!',
            ]);
        } catch (\Throwable $th) {
            $this->dispatch('qrCodesFalse', [
                'message' => 'QR Code(s) created False!',
            ]);
        }
    }
    public function render()
    {
        return view('livewire.admin.qr-code');
    }
}
