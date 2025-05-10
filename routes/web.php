<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

// Müşteri Yönetimi
Route::resource('customers', CustomerController::class);
Route::get('get-districts', [CustomerController::class, 'getDistricts'])->name('get.districts');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Müşteri Yönetimi
    Route::resource('customers', CustomerController::class);
    Route::get('get-districts', [CustomerController::class, 'getDistricts'])->name('get.districts');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
