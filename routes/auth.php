<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BankandAccountController;

// Rutas para invitados (no autenticados)
Route::middleware('guest')->group(function () {
    
    //Login
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login.authenticated');

    //Restablecimiento de contraseña
    Route::get('cambiar-contrasena', function () {
        return view('auth.forgot-password');
    })->name('password.request');

    Route::post('cambiar-contrasena', [PasswordResetController::class, 'sendResetToken'])->name('password.pin');
    Route::post('cambiar-contrasena/validacion', [PasswordResetController::class, 'validateToken'])->name('password.validate');    
    Route::get('cambiar-contrasena/{email}', [PasswordResetController::class, 'showResetForm'])->name('password.reset.form');
    Route::post('cambiar-contrasena/reset', [PasswordResetController::class, 'resetPassword'])->name('password.reset');
});

//Grupo de rutas protegidas para administradores
Route::middleware(['auth', 'role:admin'])->group(function () {
    //Ruta para el método de pagos
    Route::get('metodo-pagos', [BankandAccountController::class, 'create'])->name('payment');

    //Rutas de registro
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store'])->name('register.store');
    Route::view('registro', 'auth.register')->name('register.view');
    Route::get('registro', [RegisteredUserController::class, 'create'])->name('register.create');
    Route::post('registro', [RegisteredUserController::class, 'store'])->name('register.store');

    //Rutas de gestión de usuarios
    Route::get('usuarios', [UserController::class, 'index'])->name('users');
    Route::get('usuarios/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('usuarios/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('usuarios/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('usuarios/papelera', [UserController::class, 'papelera'])->name('users.papelera');
    Route::post('usuarios/{id}/restore', [UserController::class, 'restore'])->name('users.restore');
});


