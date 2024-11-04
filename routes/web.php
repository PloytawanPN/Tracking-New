<?php

use App\Http\Controllers\AdminsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MoneyController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\SalesController;
use App\Http\Middleware\AdminLogincheck;
use App\Http\Middleware\AdminLoginRedirect;
use Illuminate\Support\Facades\Route;



Route::prefix('/admin/asset-secure-area')->group(function () {
    Route::get('/', [AuthController::class, 'login'])->middleware([AdminLogincheck::class]);
    Route::get('/login', [AuthController::class, 'login'])->middleware([AdminLogincheck::class])->name('admin.login');
    Route::get('/ForgotPassword', [AuthController::class, 'forgotPassword'])->name('admin.forgot.password');
    Route::get('/logout', function () {
        Auth::logout();
        return redirect()->route('admin.login');
    })->name('admin.logout');

    Route::middleware([AdminLoginRedirect::class ])->group(function () {

        Route::get('/QrCodeList', [QrCodeController::class, 'QrCodeList'])->name('QrCodeList');
        Route::get('/AdminsList', [AdminsController::class, 'AdminsList'])->name('AdminsList');

        Route::prefix('production')->group(function () {
            Route::get('/', [ProductionController::class, 'list'])->name('production.list');
            Route::get('/create', [ProductionController::class, 'create'])->name('production.create');
            Route::get('/view/{id}', [ProductionController::class, 'view'])->name('production.view');
        });

        Route::prefix('sales')->group(function () {
            Route::get('/', [SalesController::class, 'list'])->name('sales.list');
            Route::get('/create', [SalesController::class, 'create'])->name('sales.create');
            Route::get('/view/{id}', [SalesController::class, 'view'])->name('sales.view');
            Route::get('/Edit/{id}', [SalesController::class, 'edit'])->name('sales.edit');
        });

        Route::prefix('Expenses')->group(function () {
            Route::get('/', [MoneyController::class, 'expenses_list'])->name('ExpensesList');
        });

        Route::get('/download-qr/{code}', [QrCodeController::class, 'download'])->name('download.qr');
        Route::get('/download-qr/{start}/{end}', [QrCodeController::class, 'downloadRange'])->name('download.qr.range');
    });

});


