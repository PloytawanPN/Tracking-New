<?php

namespace App\Livewire\Admin;

use App\Models\qr_codes;
use Livewire\Component;
use Livewire\WithPagination;
use SimpleSoftwareIO\QrCode\Facades\QrCode as GenQrCode;


class QrCode extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $numberOfQRCodes, $qrCode, $active_s, $export_s, $sold_s, $start_d, $end_d, $search;

    public function createQrCodes()
    {
        try {
            $this->validate([
                'numberOfQRCodes' => 'required|integer|min:1',
            ]);


            $highestQrCode = qr_codes::orderBy('pet_code', 'desc')->first();

            if ($highestQrCode) {
                $startCode = $highestQrCode->pet_code;
            } else {
                $startCode = 'AA000000';
            }

            $qrCodes = [];
            $prefix = substr($startCode, 0, 2);
            $lastNumber = (int) substr($startCode, 2);

            for ($i = 0; $i <= $this->numberOfQRCodes; $i++) {
                $nextNumber = $lastNumber + $i;

                if ($nextNumber > 999999) {
                    $nextNumber = 1;

                    $firstChar = $prefix[0];
                    $secondChar = $prefix[1];

                    if ($secondChar === 'Z') {
                        $secondChar = 'A';
                        $firstChar = chr(ord($firstChar) + 1);
                    } else {
                        $secondChar = chr(ord($secondChar) + 1);
                    }

                    $prefix = $firstChar . $secondChar;
                }

                $qrCode = $prefix . str_pad($nextNumber, 6, '0', STR_PAD_LEFT);
                if ($i != 0) {
                    $qrCodes[] = $qrCode;
                }
            }
            foreach ($qrCodes as $key => $value) {
                $qrCode = qr_codes::create([
                    'pet_code' => $value,
                    'qr_data' => $value,
                    'active_st' => 0,
                    'export_st' => 0,
                    'sold_st' => 0,
                    'status' => 1,
                ]);
            }

            $this->numberOfQRCodes = null;
            $this->dispatch('qrCodesCreated', [
                'message' => 'QR Code(s) created successfully!',
            ]);
        } catch (\Throwable $th) {
            $this->dispatch('qrCodesFalse', [
                'message' => $th->getMessage(),
            ]);
        }
    }

    public function Export_qr()
    {
        $qrCode = $this->generateQrCode();

        return response($qrCode)
            ->header('Content-Type', 'image/png')
            ->header('Content-Disposition', 'attachment; filename="qrcode.png"');
    }
    public function generateQrCode()
    {
        return GenQrCode::format('png')
            ->size(200)
            ->generate('123456');
    }
    public function render()
    {
        $query = qr_codes::orderBy('id');

        if ($this->active_s) {
            $query->where('active_st', $this->active_s);
        }
        if ($this->export_s) {
            $query->where('export_st', $this->export_s);
        }
        if ($this->sold_s) {
            $query->where('sold_st', $this->sold_s);
        }
        if ($this->start_d) {
            $query->where('created_at', '>=', $this->start_d);
        }
        if ($this->end_d) {
            $query->where('created_at', '<=', $this->end_d);
        }
        if ($this->search) {
            $query->where('pet_code', 'like', '%' . $this->search . '%');
            $query->where('qr_data', 'like', '%' . $this->search . '%');
        }
        $datalist = $query->paginate(15);
        return view('livewire.admin.qr-code', [
            'datalist' => $datalist
        ]);
    }
}
