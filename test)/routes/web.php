<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    // Routes that require authentication
    Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');
    Route::post('/products', [App\Http\Controllers\DashboardController::class, 'store'])->name('products.store');
    Route::get('/products/{id}/edit', [App\Http\Controllers\DashboardController::class, 'show'])->name('products.show');
    Route::put('/products/{id}', [App\Http\Controllers\DashboardController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [App\Http\Controllers\DashboardController::class, 'destroy'])->name('products.destroy');
});

// Route for login page, not protected by auth middleware
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login')->middleware('guest');
