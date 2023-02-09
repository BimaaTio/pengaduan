<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;

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

Route::get('/', function () {
    return view('index', [
        'title' => 'SIADU &mdash; Home',
        'logo' => 'siadu'
    ]);
});

// Route Login
Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'prosesLogin'])->name('prosesLogin');

// Route Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route Register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'prosesRegister'])->name('prosesRegister');

// Route Dashboard
Route::get('/dashboard', function () {
    return view('dashboard.index', [
        'title' => 'SIADU &mdash; Dashboard'
    ]);
})->middleware('auth')->name('dashboard');

// Route data laporan
Route::get('/dashboard/report', [ReportController::class, 'index'])->name('reports');
Route::get('/dashboard/buat-laporan', [ReportController::class, 'tambahLaporan'])->name('tambahLaporan');
Route::post('/insertReport', [ReportController::class, 'insertReport'])->name('insertReport');
