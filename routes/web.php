<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('index');
});

Route::get('/login', [UserController::class, 'login'])->name('user.login');
Route::get('/register', [UserController::class, 'register'])->name('user.register');
Route::get('/about', [UserController::class, 'about'])->name('about');
Route::get('/contact', [UserController::class, 'contact'])->name('contact');

Route::POST('/registers', [AuthController::class, 'register'])->name('auth.registers');
Route::POST('/logins', [AuthController::class, 'logins'])->name('auth.logins');
Route::post('/logout', [AuthController::class, 'logout']);

// Route::get('/index', [AuthController::class, 'about'])->name('about');