<?php

use App\Http\Controllers\Api\CiudadController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use Pest\Support\View;


//Dashbaord
//Route::view('/', 'dashboard.dashboard')->name('dashboard');
Route::view('/productos', 'dashboard.products')->name('products');
Route::view('/nuevo-producto', 'dashboard.new-product')->name('new-product');
Route::view('/categorias', 'dashboard.categories')->name('categories');
Route::view('/nueva-categoria', 'dashboard.new-category')->name('new-category');
Route::view('/historial-pedidos', 'dashboard.history')->name('history');
Route::view('/metodo-pagos', 'dashboard.payment')->name('payment');

//Auth registro
Route::view('/registro', 'auth.register')->name('register.view');
Route::get('/registro', [RegisteredUserController::class, 'create'])->name('register.create');
Route::post('/registro', [RegisteredUserController::class, 'store'])->name('register.store');

//Auth login
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.authenticate');

// Logout
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');



//Ruta para obtener ciudades según el departamento
Route::get('ciudades/{departamentoId}', [CiudadController::class, 'ciudadesPorDepartamento']);






//Para después
Route::middleware('auth')->group(function () {
    //
});

require __DIR__.'/auth.php';
