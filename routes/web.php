<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboarduserController;
use App\Http\Controllers\DashboardadminController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// routes/web.php
Route::get('/', [HomeController::class, 'home']);
Route::get('/dashboardUser', [DashboarduserController::class, 'DahboardUser']);
Route::get('/admin', [DashboardadminController::class, 'DashboardAdminView'])->name('admin.dashboard');
Route::get('/admin/cars', [DashboardadminController::class, 'DashboardAdminCarsView'])->name('admin.cars');
Route::get('/admin/rentals', [DashboardadminController::class, 'DashboardAdminRentalsView'])->name('admin.rentals');
Route::get('/admin/sales', [DashboardadminController::class, 'DashboardAdminSalesView'])->name('admin.sales');
Route::get('/admin/users', [DashboardadminController::class, 'DashboardAdminUsersView'])->name('admin.users');
Route::get('/admin/messages', [DashboardadminController::class, 'DashboardAdminMessagesView'])->name('admin.messages');



Route::post('/admin/cars', [DashboardadminController::class, 'store'])->name('cars.store');
Route::put('/admin/cars/{car}', [DashboardadminController::class, 'update'])->name('cars.update');
Route::delete('/admin/cars/{car}', [DashboardadminController::class, 'destroy'])->name('cars.destroy');
Route::get('/admin/cars', [DashboardadminController::class, 'manageCars'])->name('admin.cars');



Route::get('/login', [AuthController::class, 'Login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
Route::get('/register', [AuthController::class, 'Register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
