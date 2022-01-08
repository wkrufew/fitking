<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

Route::get('{plan}/checkout', [PaymentController::class, 'checkout'])->name('checkout');

Route::get('{plan}/pay', [PaymentController::class, 'pay'])->name('pay'); 

Route::get('{plan}/cash', [PaymentController::class, 'cash'])->name('cash'); 

Route::get('{plan}/approved', [PaymentController::class, 'approved'])->name('approved');

Route::get('aprobado', [PaymentController::class, 'aprobado'])->name('aprobado');

Route::get('{plan}/cash', [PaymentController::class, 'cash'])->name('cash');

Route::post('{plan}/pago', [PaymentController::class, 'pago'])->middleware('auth')->name('pago');



/* Route::get('prueba', function () {
    return view('pages.prueba');
})->name('prueba');

  */