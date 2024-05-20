<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\vendor\Chatify\MessagesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\PesananController;

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

Route::redirect('/', 'Qlos-laundry');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

Route::middleware('isCustomer')->group(function () {
    Route::get('/layanan', function () {
        return view('customer.layanan');
    })->name('layanan');
    Route::get('/promo', function () {
        return view('customer.promo');
    })->name('promo');
    Route::get('/artikel', function () {
        return view('customer.artikel');
    })->name('artikel');
    Route::get('/about', function () {
        return view('customer.about');
    })->name('about');

    Route::get('/dashboard', [CustomerController::class, 'dataCustomer'])->name('dashboard');
    Route::post('/get_layanan', [CustomerController::class, 'get_layanan'])->name('get_layanan');
    Route::post('/create_pesanan', [CustomerController::class, 'create_pesanan'])->name('create_pesanan');
});

Route::middleware('isAdmin')->group(function () {
    Route::get('/dashboard/admin', [UserController::class, 'dataKelola'])->name('dashboard/admin'); 
    // Kelola user
     Route::get('customer', [UserController::class, 'dataCustomer'])->name('customer');
     Route::get('karyawan', [UserController::class, 'dataKaryawan'])->name('karyawan');
     Route::get('admin', [UserController::class, 'dataAdmin'])->name('admin');
     Route::post('/create', [UserController::class, 'create'])->name('create'); 
     Route::post('/edit_data/{id}', [UserController::class, 'update'])->name('edit_data');  
     Route::post('/delete/{id}', [UserController::class, 'destroy'])->name('delete');
     // Kelola Kategori
     Route::get('kategori', [LayananController::class, 'dataKategori'])->name('kategori');
     Route::post('/create_kategori', [LayananController::class, 'create_kategori'])->name('create_kategori'); 
     Route::post('/edit_data_kategori/{id}', [LayananController::class, 'update_kategori'])->name('edit_data_kategori');  
     Route::post('/delete_kategori/{id}', [LayananController::class, 'destroy_kategori'])->name('delete_kategori');
    // Kelola layanan
     Route::get('layanan', [LayananController::class, 'dataLayanan'])->name('layanan');
     Route::post('/create_layanan', [LayananController::class, 'create_layanan'])->name('create_layanan'); 
     Route::post('/edit_data_layanan/{id}', [LayananController::class, 'update_layanan'])->name('edit_data_layanan');  
     Route::post('/delete_layanan/{id}', [LayananController::class, 'destroy_layanan'])->name('delete_layanan');
    // Kelola Promo
    Route::get('promo', [PromoController::class, 'dataPromo'])->name('promo');
    Route::post('/create_promo', [PromoController::class, 'create_promo'])->name('create_promo'); 
    Route::post('/edit_data_promo/{id}', [PromoController::class, 'update_promo'])->name('edit_data_promo');  
    Route::post('/delete_promo/{id}', [PromoController::class, 'destroy_promo'])->name('delete_promo');
    // Kelola Pesanan
    Route::get('pesanan_admin', [PesananController::class, 'dataPesanan'])->name('pesanan_admin');
    Route::post('/get_layanan_admin', [PesananController::class, 'get_layanan_admin'])->name('get_layanan_admin');
    Route::post('/create_pesanan_admin', [PesananController::class, 'create_pesanan'])->name('create_pesanan_admin'); 
    Route::post('/edit_data_pesanan_admin/{id}', [PesananController::class, 'update_pesanan'])->name('edit_data_pesanan_admin');  
    Route::post('/delete_pesanan/{id}', [PesananController::class, 'destroy_pesanan'])->name('delete_pesanan');
});

Route::middleware('isKaryawan')->group(function () {
    // Kelola Pesanan
    Route::get('/dashboard/karyawan', [KaryawanController::class, 'dataKaryawan'])->name('dashboard/karyawan'); 
    Route::get('/pesanan', [KaryawanController::class, 'pesanan'])->name('pesanan'); 
    Route::post('/edit_data_pesanan/{id}', [KaryawanController::class, 'update'])->name('edit_data_pesanan');
});

require __DIR__.'/auth.php';
