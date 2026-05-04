<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/', [RegisterController::class, 'show'])->name('register')->middleware('guest');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store')->middleware('guest');
    Route::get('/login', [LoginController::class, 'show'])->name('login')->middleware('guest');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store')->middleware('guest');
});

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home.index');
    Route::get('/explore', [HomeController::class, 'explore'])->name('home.explore');
    Route::get('profile/{user}', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/{user}/followers', [ProfileController::class, 'followers'])->name('profile.followers');
    Route::get('/profile/{user}/following', [ProfileController::class, 'following'])->name('profile.following');

    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

});
