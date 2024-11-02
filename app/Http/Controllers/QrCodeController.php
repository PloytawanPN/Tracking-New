<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\qr_codes;
use Illuminate\Support\Carbon;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class QrCodeController extends Controller
{
    public function QrCodeList(){
        return view('Admin.QrCode.QrCodeList');
    }
    public function download($code)
    {
        $data =$code;

        $qrCode = QrCode::format('png')
            ->size(300)
            ->margin(1)
            ->generate($data);

        $filename = 'QRTRACKING_' . $code . '_' . now()->format('Ymd') . '.png';

        qr_codes::where('pet_code', $code)->update(['export_st' => 1,'export_at'=>Carbon::now()]);

        return response($qrCode)
            ->header('Content-Type', 'image/png')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    }

    public function downloadRange($start, $end)
    {
        $qrcode = qr_codes::where('pet_code', '>=', $start)->where('pet_code', '<=', $end)->get();

        $zipFileName = 'QR_TRACKING_' . now()->format('Ymd') . '.zip';
        $zipPath = storage_path($zipFileName);
        $zip = new ZipArchive;

        if ($zip->open($zipPath, ZipArchive::CREATE) === TRUE) {

            foreach ($qrcode as $key => $value) {

                $data = $value->pet_code;


                $qrCode = QrCode::format('png')
                    ->size(300)
                    ->margin(1)
                    ->generate($data);

                $filename = 'QRTRACKING_' . $value->pet_code . '.png';
                $zip->addFromString($filename, $qrCode);
                qr_codes::where('pet_code', $value->pet_code)->update(['export_st' => 1,'export_at'=>Carbon::now()]);
            }

            $zip->close();
        }

        return response()->download($zipPath)->deleteFileAfterSend(true);
    }

}

