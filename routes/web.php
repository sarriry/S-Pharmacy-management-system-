<?php

use App\Http\Controllers\AddressController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\PharmacyController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RevenueController;
use App\Http\Controllers\ChartController;
use  Illuminate\Support\Facades\Auth;
use App\Http\Middleware\ForbidBannedUser;
use App\Http\Controllers\StripePaymentController;




//Auth Routes
Auth::routes([
    'verify' => true
]);





Route::group(['middleware' => ['auth']], function () {
    Route::middleware(['role:admin|pharmacy|doctor|client', 'logs-out-banned-user'])->group(function () {


        Route::get('/', function () {
    if (auth()->user()->hasRole('client')) {
        return redirect()->route('home');
    }

    return view('index');
})->middleware(['auth', 'logs-out-banned-user'])->name('index');





        Route::get('/home',[App\Http\Controllers\HomeController::class, 'index'])->name('home');
     Route::get('/orders/confirm/{id}', [OrderController::class, 'confirm'])->name('orders.confirm');

    Route::get('/orders/status/{id}', [OrderController::class, 'updatestatus'])->name('orders.updatestatus');
    });
    Route::middleware(['role:admin|pharmacy|doctor', 'logs-out-banned-user'])->group(function () {

        Route::get('/status/statusbarchart', 'App\Http\Controllers\ChartController@statusData')->name('statusbarchart.data');
        Route::get('/status/statuspiechart', 'App\Http\Controllers\ChartController@statusData')->name('statuspiechart.data');



        //Medicine Routes
        Route::get('/medicines', [MedicineController::class, 'index'])->name('medicines.index');
        Route::get('/medicines/{id}', [MedicineController::class, 'show'])->name('medicines.show');
        Route::post('/medicines', [MedicineController::class, 'store'])->name('medicines.store');

        //Order Routes
        Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
        Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');
        Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');



        Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
        Route::get('/orders/{id}/edit', [OrderController::class, 'edit'])->name('orders.edit');
        Route::put('/orders/{orders}', [OrderController::class, 'update'])->name('orders.update');

        //Order Route
        Route::get('/doctors', [DoctorController::class, 'index'])->name('doctors.index');
        Route::get('/doctors/{id}', [DoctorController::class, 'show'])->name('doctors.show');
        Route::get('/doctors/{id}/edit', [DoctorController::class, 'edit'])->name('doctors.edit');
        Route::put('/doctors/{id}', [DoctorController::class, 'update'])->name('doctors.update');
        

        Route::patch('/orders/{order}/accept', [OrderController::class, 'accept'])
    ->name('orders.accept');

Route::patch('/orders/{order}/cancel', [OrderController::class, 'cancel'])
    ->name('orders.cancel');
    });

    Route::group(
        ["middleware" => ['role:admin|pharmacy']],
        function () {


            //Pharmacy Routes
            Route::get('/pharmacies', [PharmacyController::class, 'index'])->name('pharmacies.index');
            Route::get('/pharmacies/{pharmacy}', [PharmacyController::class, 'show'])->name('pharmacies.show');
            Route::put('/pharmacies/{pharmacy}', [PharmacyController::class, 'update'])->name('pharmacies.update');
            Route::get('/pharmacies/{pharmacy}/edit', [PharmacyController::class, 'edit'])->name('pharmacies.edit');
            Route::post('/pharmacies', [PharmacyController::class, 'store'])->name('pharmacies.store');


            //Doctor Routes
            Route::delete('/doctors/{id}', [DoctorController::class, 'destroy'])->name('doctors.destroy');
            Route::post('/doctors', [DoctorController::class, 'store'])->name('doctors.store');
            Route::post('doctors/{doctor}/unban', [DoctorController::class, 'unban'])->name('doctors.unban');
            Route::post('doctors/{doctor}/ban', [DoctorController::class, 'ban'])->name('doctors.ban');


            //Revenue Routes
            Route::get('/revenue', [RevenueController::class, 'index'])->name('revenues.index');
        }
    );

    Route::middleware(['role:admin'])->group(function () {

        //Area Routes
        Route::get('/areas', [AreaController::class, 'index'])->name('areas.index');
        Route::delete('/areas/{id}', [AreaController::class, 'destroy'])->name('areas.destroy');
        Route::get('/areas/{id}', [AreaController::class, 'show'])->name('areas.show');
        Route::put('/areas/{area}', [AreaController::class, 'update'])->name('areas.update');
        Route::get('/areas/{id}/edit', [AreaController::class, 'edit'])->name('areas.edit');
        Route::post('/areas', [AreaController::class, 'store'])->name('areas.store');

        //Pharmacy Routes
        Route::delete('/pharmacies/{pharmacy}', [PharmacyController::class, 'destroy'])->name('pharmacies.destroy');
        Route::get('/pharmacies/restore/{pharmacy}', [PharmacyController::class, 'restore'])->name('pharmacies.restore');

        //Clients Routes
        Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
        Route::delete('/clients/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');
        Route::get('/clients/{id}', [ClientController::class, 'show'])->name('clients.show');
        Route::put('/clients/{id}', [ClientController::class, 'update'])->name('clients.update');
        Route::get('/clients/{id}/edit', [ClientController::class, 'edit'])->name('clients.edit');
        Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
        

        //Address routes
        Route::get('/addresses', [AddressController::class, 'index'])->name('addresses.index');
        Route::delete('/addresses/{id}', [AddressController::class, 'destroy'])->name('addresses.destroy');
        Route::get('/addresses/{id}', [AddressController::class, 'show'])->name('addresses.show');
        Route::put('/addresses/{id}', [AddressController::class, 'update'])->name('addresses.update');
        Route::post('/addresses', [AddressController::class, 'store'])->name('addresses.store');
        

        //Medicine routes
        Route::get('/medicines/{id}/edit', [MedicineController::class, 'edit'])->name('medicines.edit');
        Route::put('/medicines/{medicine}', [MedicineController::class, 'update'])->name('medicines.update');
        Route::delete('/medicines/{id}', [MedicineController::class, 'destroy'])->name('medicines.destroy');
    });
});
//Email-verification
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');







use App\Http\Controllers\PrescriptionScannerController;



Route::get('/prescription-scanner', [PrescriptionScannerController::class, 'index'])
    ->name('prescription-scanner.index');

Route::post('/prescription-scanner/scan', [PrescriptionScannerController::class, 'scan'])
    ->name('prescription-scanner.scan');

Route::post('/prescription-scanner/confirm', [PrescriptionScannerController::class, 'confirm'])
    ->name('prescription-scanner.confirm');

    

Route::get('/doctor-medicine-revenue', [RevenueController::class, 'doctorMedicineRevenue'])
    ->name('revenues.doctor-medicine');



use Illuminate\Support\Facades\App;

use Illuminate\Support\Facades\Session;

Route::get('/lang/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'ps', 'fa'])) {
        abort(404);
    }

    Session::put('locale', $locale);
    App::setLocale($locale);

    return redirect()->back();
})->name('lang.switch');