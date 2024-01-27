<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AboutController;

Route::get('/home', [WelcomeController::class, 'show'])->name('home');
Route::get('/about', [AboutController::class, 'show'])->name('about');
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::get('/registration', [RegisterController::class, 'show'])->name('registration');

Route::redirect('/', '/home');
