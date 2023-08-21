<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/





Route::middleware('auth')->group(function () {
//    Landing page
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

//    Profile Pages
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//    User Pages
    Route::get('/users', [ProfileController::class, 'index'])->name('users');
//    Route::get('/users', [ProfileController::class, 'edit'])->name('users.edit');
//    Route::patch('/users', [ProfileController::class, 'update'])->name('users.update');
//    Route::delete('/users', [ProfileController::class, 'destroy'])->name('users.destroy');
//    Sales Pages
    Route::get('/sales', [SalesController::class, 'index'])->name('sales');
    Route::get('/printout/{id}', [SalesController::class, 'printout'])->name('printout');
    Route::post('/sales-create', [SalesController::class, 'store'])->name('sales.store');

//    Route::get('/sales', [ProfileController::class, 'edit'])->name('sales.edit');
//    Route::patch('/sales', [ProfileController::class, 'update'])->name('sales.update');
//    Route::delete('/sales', [ProfileController::class, 'destroy'])->name('sales.destroy');

});

require __DIR__.'/auth.php';
