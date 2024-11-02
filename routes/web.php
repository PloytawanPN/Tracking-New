<?php

use App\Http\Controllers\AdminsController;
use App\Http\Controllers\QrCodeController;
use Illuminate\Support\Facades\Route;



Route::get('/', [QrCodeController::class, 'QrCodeList']);



Route::get('/QrCodeList', [QrCodeController::class, 'QrCodeList'])->name('QrCodeList');

Route::get('/AdminsList', [AdminsController::class, 'AdminsList'])->name('AdminsList');



/* ---------------------------------------------------------- */



Route::get('/download-qr/{code}', [QrCodeController::class, 'download'])->name('download.qr');
Route::get('/download-qr/{start}/{end}', [QrCodeController::class, 'downloadRange'])->name('download.qr.range');
