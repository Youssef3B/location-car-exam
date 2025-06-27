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
// Route::get('/admin/rentals', [DashboardadminController::class, 'DashboardAdminRentalsView'])->name('admin.rentals');
Route::get('/admin/messages', [DashboardadminController::class, 'DashboardAdminMessagesView'])->name('admin.messages');



Route::post('/admin/cars', [DashboardadminController::class, 'store'])->name('cars.store');
Route::put('/admin/cars/{car}', [DashboardadminController::class, 'update'])->name('cars.update');
Route::delete('/admin/cars/{car}', [DashboardadminController::class, 'destroy'])->name('cars.destroy');
Route::get('/admin/cars', [DashboardadminController::class, 'manageCars'])->name('admin.cars');




Route::get('/admin/users', [ManageUsersController::class, 'index'])->name('users.index');
Route::post('/users/{user}/toggle-block', [ManageUsersController::class, 'toggleBlock'])->name('users.toggleBlock');


Route::get('/admin/sales', [ManageSalesController::class, 'index'])->name('admin.sales');

Route::get('/admin/messages', [ManageMessagesController::class, 'index'])->name('admin.messages');


Route::get('/admin/dashboard', [ManageStatsController::class, 'index'])->name('admin.dashboard');



Route::get('/contact', [MessagesPgeController::class, 'index'])->name('contact');
Route::post('/contact', [MessagesPgeController::class, 'store'])->name('contact.store');



Route::get('/about', [AboutPgeController::class, 'index'])->name('about');



Route::get('/history', [HistoryPgeController::class, 'index'])->name('history');



 Route::get('/admin/rentals', [ManageRentalsController::class, 'index'])->name('rentals.index');

    // Route to accept a rental request
    // This route handles the POST request from the "Approve" button
 Route::post('/rentals/{id}/accept', [ManageRentalsController::class, 'accept'])->name('rentals.accept');

    // Route to decline a rental request
    // This route handles the POST request from the "Decline" button
Route::post('/rentals/{id}/decline', [ManageRentalsController::class, 'decline'])->name('rentals.decline');

    // Optional: Route to mark a rental as complete
    // This route handles the POST request from the "Mark as Completed" button
    Route::post('/rentals/{id}/complete', [ManageRentalsController::class, 'complete'])->name('rentals.complete');

    // Route to delete a rental record
    // This route handles the DELETE request from the "Delete" button
    Route::delete('/rentals/{id}', [ManageRentalsController::class, 'destroy'])->name('rentals.destroy');




    Route::get('/cars', [CarsPgeController::class, 'index']);
Route::get('/cars/{car}/details', [CarDetailssPgeController::class, 'show'])->name('cars.details');

Route::post('/cars/{car}/purchase', [CarDetailssPgeController::class, 'purchase'])
    ->name('cars.purchase')
    ->middleware('auth');



Route::get('/login', [AuthController::class, 'Login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
Route::get('/register', [AuthController::class, 'Register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
