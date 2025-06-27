<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboarduserController;
use App\Http\Controllers\DashboardadminController;
use App\Http\Controllers\ManageUsersController;
use App\Http\Controllers\ManageSalesController;
use App\Http\Controllers\ManageMessagesController;
use App\Http\Controllers\ManageStatsController;
use App\Http\Controllers\ManageRentalsController;
use App\Http\Controllers\CarsPgeController;
use App\Http\Controllers\CarDetailssPgeController;
use App\Http\Controllers\MessagesPgeController;
use App\Http\Controllers\AboutPgeController;
use App\Http\Controllers\HistoryPgeController;
use App\Http\Controllers\EditUserPgeController;

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

// Public routes
Route::get('/', [HomeController::class, 'home']);
Route::get('/about', [AboutPgeController::class, 'index'])->name('about');
Route::get('/cars', [CarsPgeController::class, 'index'])->name('cars');
Route::get('/cars/{car}/details', [CarDetailssPgeController::class, 'show'])->name('cars.details');

// Authentication routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'Login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
    Route::get('/register', [AuthController::class, 'Register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');
});

// Authenticated user routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // User dashboard and actions
    Route::get('/history', [HistoryPgeController::class, 'index'])->name('history');
    Route::get('/edituser', [EditUserPgeController::class, 'index'])->name('edituser');
    Route::post('/edituser', [EditUserPgeController::class, 'update'])->name('edituser.update');
    Route::put('/edituser', [EditUserPgeController::class, 'update'])->name('edituser.update');
    
    Route::post('/cars/{car}/purchase', [CarDetailssPgeController::class, 'purchase'])->name('cars.purchase');
    Route::get('/contact', [MessagesPgeController::class, 'index'])->name('contact');
    Route::post('/contact', [MessagesPgeController::class, 'store'])->name('contact.store');
});

// Admin-only routes
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', [DashboardadminController::class, 'DashboardAdminView'])->name('admin.dashboard');
    Route::get('/dashboard', [ManageStatsController::class, 'index'])->name('admin.dashboard');
    
    // Cars management
    Route::get('/cars', [DashboardadminController::class, 'DashboardAdminCarsView'])->name('admin.cars');
    Route::post('/cars', [DashboardadminController::class, 'store'])->name('cars.store');
    Route::put('/cars/{car}', [DashboardadminController::class, 'update'])->name('cars.update');
    Route::delete('/cars/{car}', [DashboardadminController::class, 'destroy'])->name('cars.destroy');
    Route::get('/cars', [DashboardadminController::class, 'manageCars'])->name('admin.cars');
    
    // Users management
    Route::get('/users', [ManageUsersController::class, 'index'])->name('users.index');
    Route::post('/users/{user}/toggle-block', [ManageUsersController::class, 'toggleBlock'])->name('users.toggleBlock');
    
    // Sales management
    Route::get('/sales', [ManageSalesController::class, 'index'])->name('admin.sales');
    
    // Messages management
    Route::get('/messages', [ManageMessagesController::class, 'index'])->name('admin.messages');
    
    // Rentals management
    Route::get('/rentals', [ManageRentalsController::class, 'index'])->name('rentals.index');
    Route::post('/rentals/{id}/accept', [ManageRentalsController::class, 'accept'])->name('rentals.accept');
    Route::post('/rentals/{id}/decline', [ManageRentalsController::class, 'decline'])->name('rentals.decline');
    Route::post('/rentals/{id}/complete', [ManageRentalsController::class, 'complete'])->name('rentals.complete');
    Route::delete('/rentals/{id}', [ManageRentalsController::class, 'destroy'])->name('rentals.destroy');
});