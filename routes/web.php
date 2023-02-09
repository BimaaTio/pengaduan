<?php

use App\Models\User;
use App\Models\People;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;

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
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Route Register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'prosesRegister'])->name('prosesRegister');

// Route Dashboard
Route::get('/dashboard', function () {
    $dataUser  = User::all();
    return view('dashboard.index', [
        'title' => 'SIADU &mdash; Dashboard'
    ]);
})->middleware('auth')->name('dashboard');

// Route data laporan
Route::get('/dashboard/report', [ReportController::class, 'index'])->name('reports');
Route::get('/dashboard/buat-laporan', [ReportController::class, 'tambahLaporan'])->name('tambahLaporan');
Route::post('/insertReport', [ReportController::class, 'insertReport'])->name('insertReport');
Route::get('/dashboard/report/hapus/{id:id}', [ReportController::class, 'hapusLaporan'])->name('hapusLaporan');


// Route kelola masyarakat
Route::get('/dashboard/masyarakat', [PeopleController::class, 'index'])->name('masyrakat');
// Register Masyarakat
Route::get('/dashboard/buat-akun-masyarakat', [PeopleController::class, 'buatAkun'])->name('buatAkun');
Route::post('/insertMasyarakat', [RegisterController::class, 'masyarakat'])->name('akunMasyarakat');