<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;

Route::get('/', [MainController::class, 'index'])->name('welcome');


Route::get('/register', [AuthController::class, 'register'])->name('get.register');
Route::post('/register', [AuthController::class, 'postRegister'])->name('post.register');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [MainController::class, 'dashboard'])->name('dashboard');
});
