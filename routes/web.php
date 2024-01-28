<?php

use App\Http\Controllers\BorrowController;
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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');


Route::get('employees', [DashboardController::class, 'employees'])->name('employees');
Route::get('items', [DashboardController::class, 'items'])->name('items');
Route::resource('borrow', BorrowController::class);
Route::get('/getUserName/{id}', [DashboardController::class, 'getUserName']);
