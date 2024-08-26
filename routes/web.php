<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PembukaanRekeningController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\MasterDataController;
use App\Http\Controllers\UnblockUserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PekerjaanController;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

// Test DB connection route
Route::get('/test-db', function () {
    try {
        DB::connection()->getPdo();
        return "Connected to the database successfully!";
    } catch (\Exception $e) {
        return "Could not connect to the database. Error: " . $e->getMessage();
    }
});

// Auth Routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Registration Routes
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::get('/api/provinsi', [MasterDataController::class, 'provinsi']);
Route::get('/api/kabupaten/{provinsi_id}', [MasterDataController::class, 'kabupaten']);
Route::get('/api/kecamatan/{kabupaten_id}', [MasterDataController::class, 'kecamatan']);
Route::get('/api/kelurahan/{kecamatan_id}', [MasterDataController::class, 'kelurahan']);

// Protected Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('pembukaan-rekening', PembukaanRekeningController::class);
    
    Route::get('/approval', [ApprovalController::class, 'index'])->name('approval.index');
    Route::put('/approval/{id}', [ApprovalController::class, 'approve'])->name('approval.approve');

    Route::get('/master-data/provinsi', [MasterDataController::class, 'provinsi']);
    Route::get('/master-data/kabupaten/{provinsi_id}', [MasterDataController::class, 'kabupaten']);
    Route::get('/master-data/kecamatan/{kabupaten_id}', [MasterDataController::class, 'kecamatan']);
    Route::get('/master-data/kelurahan/{kecamatan_id}', [MasterDataController::class, 'kelurahan']);
    Route::get('/unblock', [UnblockUserController::class, 'index'])->name('unblock.index');
    Route::patch('/unblock/{user}', [UnblockUserController::class, 'unblock'])->name('unblock.user');
    Route::resource('pekerjaan', PekerjaanController::class);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
