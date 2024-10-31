<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Admin.Layout.Layout');
});

Route::get('/QrCodeList', function () {
    return view('Admin.QrCode.QrCodeList');
})->name('QrCodeList');
