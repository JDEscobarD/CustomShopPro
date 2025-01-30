<?php

use App\Http\Controllers\Api\CiudadController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use Pest\Support\View;


//Auth login
Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login.authenticated');
// Logout
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


//Rutas autenticadas
Route::middleware('auth')->group(function () {
    // Rutas para el dashboard
    Route::view('/', 'dashboard.dashboard')->name('dashboard');

    Route::view('productos', 'dashboard.products')->name('products');
    Route::view('nuevo-producto', 'dashboard.new-product')->name('new-product');
    
    Route::get('categorias', [CategoryController::class, 'index'])->name('categories');    
    Route::get('nueva-categoria', [CategoryController::class, 'create'])->name('new-category');
    Route::post('nueva-categoria', [CategoryController::class, 'store'])->name('categories.store');
    
    Route::view('historial-pedidos', 'dashboard.history')->name('history');
    Route::view('metodo-pagos', 'dashboard.payment')->name('payment');
    
    //Auth registro
    Route::view('registro', 'auth.register')->name('register.view');
    Route::get('registro', [RegisteredUserController::class, 'create'])->name('register.create');
    Route::post('registro', [RegisteredUserController::class, 'store'])->name('register.store');
    //Otras rutas autenticadas
    Route::get('usuarios', [AuthenticatedSessionController::class, 'index'])->name('users');
});

require __DIR__ . '/auth.php';

//Ruta para obtener ciudades según el departamento
Route::get('ciudades/{departamentoId}', [CiudadController::class, 'ciudadesPorDepartamento']);
