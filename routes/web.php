<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RegisterController::class, 'show'])->name('register.show');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::get('/login', [LoginController::class, 'show'])->name('login.show');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::get('/home', [HomeController::class, 'index'])->name('home.index');
Route::post('/logout', [LogoutController::class, 'logout'])->middleware('auth')->name('logout');
Route::get('profile/{user}', [ProfileController::class, 'show'])->name('profile.show');
