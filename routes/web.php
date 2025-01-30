<?php

use App\Http\Controllers\Api\CiudadController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
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
    Route::get('categorias/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('categorias/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('categorias/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    Route::view('historial-pedidos', 'dashboard.history')->name('history');
});

// Grupo de rutas protegidas para administradores
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Ruta para el método de pagos
    Route::view('metodo-pagos', 'dashboard.payment')->name('payment');

    // Rutas de registro
    Route::view('registro', 'auth.register')->name('register.view');
    Route::get('registro', [RegisteredUserController::class, 'create'])->name('register.create');
    Route::post('registro', [RegisteredUserController::class, 'store'])->name('register.store');

    // Rutas de gestión de usuarios
    Route::get('usuarios', [UserController::class, 'index'])->name('users');
    Route::get('usuarios/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('usuarios/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('usuarios/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('usuarios/papelera', [UserController::class, 'papelera'])->name('users.papelera');
    Route::post('usuarios/{id}/restore', [UserController::class, 'restore'])->name('users.restore');
});

require __DIR__ . '/auth.php';

//Ruta para obtener ciudades según el departamento
Route::get('ciudades/{departamentoId}', [CiudadController::class, 'ciudadesPorDepartamento']);
