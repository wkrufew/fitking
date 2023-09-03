<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Livewire\PaymentOrder;
use App\Http\Livewire\TransferenciaComponent;

Route::get('{plan}/verification', [PaymentController::class, 'verification'])->name('verification');
Route::get('{plan}/checkout', PaymentOrder::class)->middleware('auth')->name('checkout'); 
/* Route::get('{plan}/pay', [PaymentController::class, 'pay'])->name('pay');  */

/* Route::get('{plan}/cash', [PaymentController::class, 'cash'])->middleware('auth')->name('cash');  */
Route::get('{plan}/cash', TransferenciaComponent::class)->middleware('auth')->name('cash');

/* Route::get('{plan}/approved', [PaymentController::class, 'approved'])->name('approved'); */

/* Route::get('{plan}/approved', [PaymentController::class, 'approved'])->name('approved'); */

Route::get('aprobado', [PaymentController::class, 'aprobado'])->middleware('auth')->name('aprobado');

/* Route::get('{plan}/cash', [PaymentController::class, 'cash'])->middleware('auth')->name('cash'); */

Route::post('{plan}/pago', [PaymentController::class, 'pago'])->middleware('auth')->name('pago');



/* Route::get('prueba', function () {
    return view('pages.prueba');
})->name('prueba');

  */