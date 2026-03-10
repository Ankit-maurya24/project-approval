<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/registration-form', [AuthController::class, 'registrationForm'])->name('registration.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'loginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'loginForms'])->name('login.submit');


Route::get('/user/dashboard', [UserController::class, 'userDashboard'])->name('user.dashboard');
Route::get('/admin/dashboard', [UserController::class, 'adminDashboard'])->name('admin.dashboard');
Route::post('/logout', [AuthController::class,'logout'])->name('logout');
