<?php

use App\Http\Controllers\CommentController;
use App\Models\User;
use App\Models\People;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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
})->name('home');

// Route Login
Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'prosesLogin'])->name('prosesLogin');

// Route Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Route Register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest')->name('register');
Route::post('/registerMas', [RegisterController::class, 'masyarakat']);
Route::post('/registerPet', [RegisterController::class, 'petugas']);
Route::post('/register', [RegisterController::class, 'prosesRegister']);

// Route Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

// Route data laporan
Route::get('/dashboard/report', [DashboardController::class, 'indexReport'])->name('reports');
Route::get('/dashboard/buat-laporan', [DashboardController::class, 'tambahLaporan']);
Route::post('/insertReport', [DashboardController::class, 'insertReport']);
Route::get('/dashboard/report/hapus/{id:id}', [DashboardController::class, 'hapusLaporan']);


// Route tanggapan laporan
Route::get('/dashboard/report/tanggapi/{id:id}', [DashboardController::class, 'indexComment'])->name('tanggapan');
Route::post('/insertTanggapan', [DashboardController::class, 'tanggapi'])->name('tanggapi');
Route::get('/dashboard/tanggapan/hapus/{id:id}', [DashboardController::class, 'hapusComment']);

// Route kelola masyarakat
Route::get('/dashboard/masyarakat', [DashboardController::class, 'masyarakat'])->name('masyarakat');
Route::get('/dashboard/buat-akun-masyarakat', [DashboardController::class, 'buatAkunMasyarakat']);
Route::get('/dashboard/masyarakat/hapus/{nik:nik}', [DashboardController::class, 'hapusMas']);

// Route Kelola Petugas
Route::get('/dashboard/petugas', [DashboardController::class, 'petugas'])->name('petugas');
Route::get('/dashboard/buat-akun-petugas', [DashboardController::class, 'buatAkunPetugas']);
Route::get('/dashboard/petugas/hapus/{nik:nik}', [DashboardController::class, 'hapusPet']);
