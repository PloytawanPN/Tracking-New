<?php

use App\Http\Controllers\AdminsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\MoneyController;
use App\Http\Controllers\PetProfileController;
use App\Http\Controllers\PetsController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\UserAccountController;
use App\Http\Middleware\AdminLogincheck;
use App\Http\Middleware\AdminLoginRedirect;
use App\Http\Middleware\CheckPath;
use App\Http\Middleware\CheckSelectPet;
use App\Http\Middleware\langMiddleware;
use App\Http\Middleware\OwnerDashboardMiddleware;
use App\Http\Middleware\OwnerLoginMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware([langMiddleware::class])->group(function () {
    Route::prefix('/register/step')->group(function () {
        Route::get('1', [PetsController::class, 'registerPet_1'])->name('register.pet.1');
        Route::get('2', [PetsController::class, 'registerPet_2'])->name('register.pet.2');
        Route::get('3', [PetsController::class, 'registerPet_3'])->name('register.pet.3');
        Route::get('4', [PetsController::class, 'registerPet_4'])->name('register.pet.4');
        Route::get('success', [PetsController::class, 'registerSuccess'])->name('register.pet.success');
    });
    Route::get('/addYourPet/{code}', [PetsController::class, 'addYourPet'])->name('addYourPet');
    Route::get('/Galyxie/{code}', [PetsController::class, 'Galyxie'])->name('Galyxie');
    Route::get('/erroCode', [PetsController::class, 'error_code'])->name('error_code');
    Route::middleware([CheckPath::class])->group(function () {
        Route::prefix('/profile')->group(function () {
            Route::get('/pet/{code}', [PetProfileController::class, 'profile'])->name('pet.profile');
            Route::get('/owner/{code}', [PetProfileController::class, 'owner'])->name('owner.profile');
            Route::get('/healthInfo/{code}', [PetProfileController::class, 'healthInfo'])->name('pet.healthInfo');
        });
    });



    Route::get('/login', [AuthUserController::class, 'login'])->name('login.user')->middleware(OwnerLoginMiddleware::class);
    Route::get('/forgotPassword', [AuthUserController::class, 'forgotPassword'])->name('forgotPassword.user');
    Route::get('/changePassword/{token}', [AuthUserController::class, 'changePassword'])->name('changePassword.user');

    Route::get('/tokenError', [AuthUserController::class, 'tokenError'])->name('tokenError.user');
    Route::get('/sendSuccess', [AuthUserController::class, 'sendSuccess'])->name('sendSuccess.user');
    Route::get('/changeSuccess', [AuthUserController::class, 'changeSuccess'])->name('changeSuccess.user');
    Route::get('/404', [AuthUserController::class, 'notFound'])->name('notFound.user');

    Route::middleware([OwnerDashboardMiddleware::class])->group(function () {
        Route::prefix('/pet-setting')->group(function () {
            Route::get('/', [UserAccountController::class, 'portal'])->name('portal.user');

            Route::middleware([CheckSelectPet::class])->group(function () {
                Route::get('/profile/{code}', [UserAccountController::class, 'petProfile'])->name('profile.petSetting');
                Route::get('/HealthInfo/{code}', [UserAccountController::class, 'HealthInfo'])->name('HealthInfo.petSetting');
                Route::prefix('/VaccinationHistory')->group(function () {
                    Route::get('/{code}', [UserAccountController::class, 'VaccinationHistort'])->name('VaccinationHistort.petSetting');
                    Route::get('/create/{code}', [UserAccountController::class, 'VaccinationHistort_create'])->name('VaccinationHistort.create');
                    Route::get('/edit/{code}/{id}', [UserAccountController::class, 'VaccinationHistort_edit'])->name('VaccinationHistort.edit');
                });
                Route::prefix('/HealthIssues')->group(function () {
                    Route::get('/{code}', [UserAccountController::class, 'HealthIssuesHistort'])->name('HealthIssuesHistort.petSetting');
                    Route::get('/create/{code}', [UserAccountController::class, 'HealthIssuesHistort_create'])->name('HealthIssuesHistort.create');
                    Route::get('/edit/{code}/{id}', [UserAccountController::class, 'HealthIssuesHistort_edit'])->name('HealthIssuesHistort.edit');
                });
                Route::prefix('/AllergiesHistory')->group(function () {
                    Route::get('/{code}', [UserAccountController::class, 'AllergiesHistory'])->name('AllergiesHistory.petSetting');
                    Route::get('/create/{code}', [UserAccountController::class, 'AllergiesHistory_create'])->name('AllergiesHistory.create');
                    Route::get('/edit/{code}/{id}', [UserAccountController::class, 'AllergiesHistory_edit'])->name('AllergiesHistory.edit');
                });
                Route::prefix('/MedicalHistory')->group(function () {
                    Route::get('/{code}', [UserAccountController::class, 'MedicalHistory'])->name('MedicalHistory.petSetting');
                    Route::get('/create/{code}', [UserAccountController::class, 'MedicalHistory_create'])->name('MedicalHistory.create');
                    Route::get('/edit/{code}/{id}', [UserAccountController::class, 'MedicalHistory_edit'])->name('MedicalHistory.edit');
                });
                Route::prefix('/WeightRecord')->group(function () {
                    Route::get('/{code}', [UserAccountController::class, 'WeightRecord'])->name('WeightRecord.petSetting');
                    Route::get('/create/{code}', [UserAccountController::class, 'WeightRecord_create'])->name('WeightRecord.create');
                    Route::get('/edit/{code}/{id}', [UserAccountController::class, 'WeightRecord_edit'])->name('WeightRecord.edit');
                });
            });
        });
        Route::get('/profile-setting', [UserAccountController::class, 'profile'])->name('profile.user');
    });
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


