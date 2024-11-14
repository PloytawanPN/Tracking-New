<?php

namespace App\Http\Controllers;

use Crypt;
use Illuminate\Http\Request;
use App\Models\qr_codes;
use Illuminate\Support\Carbon;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use ZipArchive;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;


class QrCodeController extends Controller
{
    public function QrCodeList()
    {
        return view('Admin.QrCode.QrCodeList');
    }
    public function download($code)
    {

        $data = route('Galyxie', $code);

        $tempFile = tempnam(sys_get_temp_dir(), 'qrcode') . '.png';
        QrCode::format('png')
            ->size(430)
            ->margin(1)
            ->generate($data, $tempFile);


        $manager = new ImageManager(new Driver());
        $image = $manager->create(512, 512)->fill('ffffff');
        $image->place($tempFile, 'center', 0, 0);
        /* $image->text($code, 256, 465, function ($font) {
            $font->file(public_path('assets\fonts\Nunito-bold.ttf'));
            $font->size(45);
            $font->align('center');
            $font->valign('middle');
        }); */

        $filename = 'QRTRACKING_' . $code . '_' . now()->format('Ymd') . '.png';

        qr_codes::where('pet_code', $code)->update(['export_st' => 1, 'export_at' => Carbon::now()]);

        return response($image->toPng())
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

                $data = route('Galyxie', $value->pet_code);


                // สร้างไฟล์ QR Code ชั่วคราว
                $tempFile = tempnam(sys_get_temp_dir(), 'qrcode') . '.png';
                QrCode::format('png')
                    ->size(430)
                    ->margin(1)
                    ->generate($data, $tempFile);

                $manager = new ImageManager(new Driver());
                $image = $manager->create(512, 512)->fill('ffffff');
                $image->place($tempFile, 'center', 0, 0);
                /* $image->text($value->pet_code, 256, 465, function ($font) {
                    $font->file(public_path('\assets\fonts\Nunito-bold.ttf'));
                    $font->size(45);
                    $font->align('center');
                    $font->valign('middle');
                }); */

                $filename = 'QRTRACKING_' . $value->pet_code . '_' . now()->format('Ymd') . '.png';
                $tempImagePath = sys_get_temp_dir() . '/' . $filename;
                $image->save($tempImagePath);

                $zip->addFile($tempImagePath, $filename);


                qr_codes::where('pet_code', $value->pet_code)->update(['export_st' => 1, 'export_at' => Carbon::now()]);
            }

            $zip->close();
        }

        return response()->download($zipPath)->deleteFileAfterSend(true);
    }

}

