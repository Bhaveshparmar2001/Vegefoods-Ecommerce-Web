<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
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

Route::get('/', function () {
    return view('welcome');
});

// Admin
Route::prefix('admin')->group(function () {
    
    //---------ADMIN LOGIN SECTION--------------

    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin-login');
    Route::post('/login', [LoginController::class, 'login'])->name('admin-login-submit');
    Route::post('/forgot', [LoginController::class, 'forgot'])->name('admin.forgot.submit');
    Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');

    //---------ADMIN LOGIN SECTION END----------

    //---------ADMIN DASHBOARD START------------

    Route::get('/', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
    //--------ADMIN DASHBOARD END---------------
});
