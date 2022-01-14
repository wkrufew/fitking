<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoriaController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RolController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ControllerSlider;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PirceController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\SubcategoryController;

//rutas para la parte administrativa
Route::get('', [HomeController::class, 'index'])->middleware('can:Ver Dashboard')->name('home'); 
//rutas para los roles
Route::resource('roles', RolController::class)->names('roles');
//rutas para los usuarios
Route::resource('users', UserController::class)->only(['index','edit','update'])->names('users');

//rutas para las categorias
Route::resource('categories', CategoryController::class)->names('categories');

Route::resource('levels', LevelController::class)->names('levels');

Route::resource('prices', PirceController::class)->names('prices');

Route::get('courses', [CourseController::class, 'index'])->name('courses.index');

Route::get('courses/{course}', [CourseController::class, 'show'])->name('courses.show');

Route::post('courses/{course}/approved', [CourseController::class, 'approved'])->name('courses.approved');

//Ruta para matricular un estudiante a un curso
Route::get('students', [StudentController::class, 'index'])->name('students.index');
Route::post('students/{student}/aprobar', [StudentController::class, 'aprobar'])->name('students.aprobar');
Route::delete('students/{student}/destroy', [StudentController::class, 'destroy'])->name('students.destroy');

//RUTAS PARA LA TIENDA

//Categorias de la tienda
Route::resource('categorias', CategoriaController::class)->names('categorias');
//rutas para las subcategorias
Route::resource('subcategories', SubcategoryController::class)->names('subcategories');
//rutas para las marcas
Route::resource('brands', BrandController::class)->names('brands');

//ruta para los productos
Route::resource('products', ProductController::class)->names('products');
//Activar o desactivar un producto
Route::post('products/{product}/estado', [ProductController::class, 'activar'])->name('products.estado');

Route::get('courses', [CourseController::class, 'index'])->name('courses.index');

Route::get('orders' , [OrderController::class, 'index'])->name('orders.index');
//ver los detalles de una orden
Route::get('view/order/{id}' , [OrderController::class, 'viewOrder']);
//acepta el pago de la orden
Route::get('payment/accept/{id}' , [OrderController::class, 'PaymentAccept']);
//cancela la orden
Route::get('payment/cancel/{id}' , [OrderController::class, 'PaymentCancel']);

//listado de ordenes aceptadas
Route::get('accept/payment' , [OrderController::class, 'AcceptPayment'])->name('orders.accept');
//listado de ordenes canceladas
Route::get('cancel/payment' , [OrderController::class, 'CancelOrder'])->name('orders.cancel');
//listado de ordenes en proceso de entrega
Route::get('process/payment' , [OrderController::class, 'ProcessPayment'])->name('orders.process');
//listado de finalizadas entregadas
Route::get('success/payment' , [OrderController::class, 'SuccessPayment'])->name('orders.success');
//acepta el pago de la orden
Route::get('delivery/process/{id}' , [OrderController::class, 'DeleveryProcess']);
Route::get('delivery/done/{id}' , [OrderController::class, 'DeleveryDone']);
//datos de la tienda
Route::resource('settings', SettingsController::class)->only(['index','edit', 'update'])->names('settings');

Route::get('/sliders', [ControllerSlider::class, 'index'])->name('sliders.index');
Route::get('sliders/create', [ControllerSlider::class, 'create'])->name('sliders.create');
Route::post('sliders', [ControllerSlider::class,'store'])->name('sliders.store');
Route::get('sliders/{slider}/edit', [ControllerSlider::class, 'edit'])->name('sliders.edit');
Route::put('sliders/{slider}', [ControllerSlider::class, 'update'])->name('sliders.update');
Route::delete('sliders/{slider}', [ControllerSlider::class, 'destroy'])->name('sliders.destroy');

