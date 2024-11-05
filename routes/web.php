<?php

use App\Http\Controllers\AdminsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MoneyController;
use App\Http\Controllers\PetsController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\SalesController;
use App\Http\Middleware\AdminLogincheck;
use App\Http\Middleware\AdminLoginRedirect;
use App\Http\Middleware\langMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware([langMiddleware::class])->group(function () {
    Route::get('/', [PetsController::class, 'registerPet'])->name('register.pet');
});

Route::get('/language/{lang}', function ($lang) {
    session(['locale' => $lang]);
    App::setLocale($lang);
    return response()->json(['status' => 'Language switched to ' . $lang]);
})->name('change.language');


Route::prefix('/admin/asset-secure-area')->group(function () {
    Route::get('/', [AuthController::class, 'login'])->middleware([AdminLogincheck::class]);
    Route::get('/login', [AuthController::class, 'login'])->middleware([AdminLogincheck::class])->name('admin.login');

    Route::get('/ForgotPassword', [AuthController::class, 'forgotPassword'])->middleware([AdminLogincheck::class])->name('admin.forgot.password');
    Route::get('/ChangePassword/{token}', [AuthController::class, 'changePassword'])->middleware([AdminLogincheck::class])->name('admin.change.password');

    Route::get('/logout', function () {
        Auth::logout();
        return redirect()->route('admin.login');
    })->name('admin.logout');

    Route::middleware([AdminLoginRedirect::class])->group(function () {

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


