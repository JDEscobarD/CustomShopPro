<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use Pest\Support\View;


//Dashbaord
Route::view('/', 'dashboard.dashboard')->name('dashboard');
Route::view('/productos', 'dashboard.products')->name('products');
Route::view('/nuevo-producto', 'dashboard.new-product')->name('new-product');
Route::view('/categorias', 'dashboard.categories')->name('categories');
Route::view('/nueva-categoria', 'dashboard.new-category')->name('new-category');
Route::view('/historial-pedidos', 'dashboard.history')->name('history');
Route::view('/metodo-pagos', 'dashboard.payment')->name('payment');

//Auth
Route::view('/registro', 'auth.register')->name('register');
Route::post('/registro', [RegisteredUserController::class, 'store'])->name('register');







//Para después
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
