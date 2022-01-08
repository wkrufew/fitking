<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ProductController;
use App\Http\Livewire\CourseStatus;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', HomeController::class)->name('home');

Route::get('/tienda', function () {
    return view('pages.index');
})->name('tienda');

/*Route::get('/perfiltienda', function () {
    return view('pages.perfiltienda');
});*/

//Route::get('/tienda', [HomeController::class, 'tienda'])->name('pages.index');

Route::get('/perfiltienda', [HomeController::class, 'perfiltienda'])->name('pages.perfiltienda')->middleware('auth');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('cursos', [PlanController::class, 'index'])->name('cursos.index');

Route::get('cursos/{plan}', [PlanController::class, 'show'])->name('planes.show');
//ruta para matricularse a un curso
Route::post('cursos/{plan}/enrolled', [PlanController::class, 'enrolled'])->middleware('auth')->name('planes.enrolled');

//ruta del control del avance del curso
Route::get('curso-status/{plan}', CourseStatus::class)->name('planes.status')->middleware('auth');


//rutas para el carrito de compras
 Route::get('/add/to/cart/{id}', [CartController::class, 'addCart']);
 Route::get('check', [CartController::class, 'check']);

 Route::get('remove/cart/{rowId}', [CartController::class, 'removeCart']);

 Route::post('update/cart/item/', [CartController::class, 'updateCart'])->name('update.cartitem');


 Route::get('/product/cart', [CartController::class, 'showCart'])->name('show.cart');

 Route::get('/product/details/{id}/{product_name}', [ProductController::class, 'productView']);
 
 Route::post('/cart/product/add/{id}', [ProductController::class, 'addCart']);



 ///para traer los datos al modal
 Route::get('/cart/product/view/{id}', [CartController::class, 'viewProduct']);

 Route::post('/insert/into/cart/', [CartController::class, 'insertCart'])->name('insert.into.cart');

 Route::get('users/checkout/', [CartController::class, 'Checkout'])->name('user.checkout');

 Route::get('payment/step/', [CartController::class, 'paymentPage'])->name('payment.step');

 /* Route::get('{datos}/aprobado', [PaymentController::class, 'aprobado'])->name('aprobado'); */

 Route::post('user/payment/process/', [PaymentController::class, 'Payment'])->name('payment.process');

 //pagina de los productos
 Route::get('products/{id}', [ProductController::class, 'productsView']);

 Route::get('allcategory/{id}', [ProductController::class, 'CategoryView']);

 //busqueda de los productos
 Route::post('product/search', [CartController::class, 'Search'])->name('product.search');






 


 