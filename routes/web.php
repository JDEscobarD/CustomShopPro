<?php

use App\Http\Controllers\CiudadController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProductsController;

//Rutas públicas
Route::middleware('guest')->group(function () {    
});

//Rutas autenticadas
Route::middleware('auth')->group(function () {
    //Rutas para el dashboard
    Route::view('/', 'dashboard.dashboard')->name('dashboard');
    Route::view('productos', 'dashboard.products')->name('products');
    Route::view('nuevo-producto', 'dashboard.new-product')->name('new-product');
    Route::view('historial-pedidos', 'dashboard.history')->name('history');    
    //Rutas de categorías
    Route::get('categorias', [CategoryController::class, 'index'])->name('categories');
    Route::get('nueva-categoria', [CategoryController::class, 'create'])->name('new-category');
    Route::post('nueva-categoria', [CategoryController::class, 'store'])->name('categories.store');
    Route::delete('categories/batch-action', [CategoryController::class, 'batchAction'])->name('categories.batch.action');
    Route::get('categorias/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('categorias/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('categorias/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::get('/categories/search', [CategoryController::class, 'search'])->name('categories.search');
    //Filtro ciudades
    Route::get('/ciudades/{departamento}', [CiudadController::class, 'getCiudadesByDepartamento']);
    //Logout
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::post('productos/store', [ProductsController::class, 'store'])->name('products.store');
});

//Incluir rutas de autenticación
require __DIR__ . '/auth.php';

