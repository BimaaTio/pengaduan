<?php

// use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
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
    ]);})->name('home');

// Route Daftar Aduan
Route::get('/daftar-laporan', [ReportController::class, 'index'])->name('daftarAduan');
Route::get('/daftar-laporan/show/{id:id}', [ReportController::class, 'show'])->name('showLaporan');

// Route group Login & register
Route::group(['midlleware' => 'guest'], function () {
    // Route Login
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'prosesLogin'])->name('prosesLogin');

    // Route Register
    Route::get('/register', [RegisterController::class, 'index'])->middleware('guest')->name('register');
    Route::post('/register', [RegisterController::class, 'prosesRegister']);
});


// Route Group Role Admin
Route::group(['middleware' => ['auth', 'hakAkses:a']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Route data laporan
    Route::get('/dashboard/report', [DashboardController::class, 'indexReport'])->name('reports');
    Route::get('/dashboard/buat-laporan', [DashboardController::class, 'tambahLaporan'])->name('buatLaporan');
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
    Route::post('/registerMas', [RegisterController::class, 'masyarakat']);
    // Route Kelola Petugas
    Route::get('/dashboard/petugas', [DashboardController::class, 'petugas'])->name('petugas');
    Route::get('/dashboard/buat-akun-petugas', [DashboardController::class, 'buatAkunPetugas']);
    Route::get('/dashboard/petugas/hapus/{nik:nik}', [DashboardController::class, 'hapusPet']);
    Route::post('/registerPet', [RegisterController::class, 'petugas']);

    // Route Kelola Admin
    Route::get('/dashboard/admin', [DashboardController::class, 'admin'])->name('admin');
    Route::get('/dashboard/buat-akun-admin', [DashboardController::class, 'buatAkunAdmin']);
    Route::get('/dashboard/admin/hapus/{nik:nik}', [DashboardController::class, 'hapusAdm']);
    Route::post('/registerAdm', [RegisterController::class, 'admin']);

    // Route Logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

// Route Group role Petugas
Route::group(['middleware' => ['auth', 'hakAkses:p,a']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Route data laporan
    Route::get('/dashboard/report', [DashboardController::class, 'indexReport'])->name('reports');
    Route::get('/dashboard/report/hapus/{id:id}', [DashboardController::class, 'hapusLaporan']);
    // Route tanggapan laporan
    Route::get('/dashboard/report/tanggapi/{id:id}', [DashboardController::class, 'indexComment'])->name('tanggapan');
    Route::post('/insertTanggapan', [DashboardController::class, 'tanggapi'])->name('tanggapi');
    Route::get('/dashboard/tanggapan/hapus/{id:id}', [DashboardController::class, 'hapusComment']);
    // Route Logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

// Route Group Role Masyarkat
Route::group(['middleware' => ['auth', 'hakAkses:a,p,m']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Route data laporan
    Route::get('/dashboard/buat-laporan', [DashboardController::class, 'tambahLaporan'])->name('buatLaporan');
    Route::post('/insertReport', [DashboardController::class, 'insertReport']);
    // Route Logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});