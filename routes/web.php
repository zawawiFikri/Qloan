<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\vendor\Chatify\MessagesController;
use App\Http\Controllers\UserController;

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
    Route::get('/dashboard', function () {
        return view('customer.home');
    })->name('dashboard');
    Route::get('/chatify/2', [MessagesController::class, 'index'])->name('user');
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
});

Route::middleware('isAdmin')->group(function () {
    Route::get('/dashAdmin', function () {
        return view('admin.dashboard');
    })->name('dashAdmin');
    Route::get('/chatify', [MessagesController::class, 'index'])->name('userAdmin');
    // Route::get('/users', function () {
    //     return view('admin.user');
    // })->name('users');

     //User
     Route::get('users', [UserController::class, 'dataUsers'])->name('users');
     Route::post('/create_user', [UserController::class, 'create'])->name('create_user'); 
     Route::post('/edit_data_user/{id}', [UserController::class, 'update'])->name('edit_data_user');  
     Route::post('/delete_user/{id}', [UserController::class, 'destroy'])->name('delete_user');   
});

Route::middleware('isKaryawan')->group(function () {
    Route::get('/dashKaryawan', function () {
        return view('karaywan');
    })->name('dashKaryawan');
});

require __DIR__.'/auth.php';
