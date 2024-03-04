<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UtamaController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PelangganController;

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

// Routes for handling authentication using Sanctum
Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::post('/', [AuthController::class, 'login']);
});

// Routes for authenticated users using Sanctum
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/home', function () {
        return redirect()->route('admin.dashboard.index');
    })->name('home');

    // Admin Routes
    Route::prefix('admin')->name('admin.')->middleware('admin:admin')->group(function () {
        Route::get('/', [UtamaController::class, 'index'])->name('dashboard.index');
        Route::resource('kategori', KategoriController::class);
        Route::resource('pelanggan', PelangganController::class);
        Route::resource('satuan', SatuanController::class);
        Route::resource('supplier', SupplierController::class);
    });

    // Pemilik Routes
    Route::prefix('admin')->name('admin.')->middleware('admin:pemilik')->group(function () {
        Route::get('/pemilik', [UtamaController::class, 'index'])->name('dashboard.pemilik');
    });

    // Logout Route
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
