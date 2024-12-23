<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [AuthController::class, 'index'])->name('home');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/email/verify/{token}', [AuthController::class, 'verify'])->name('email.verify');



Route::middleware(['auth', 'isEmailIsVerified'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
});