<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfilController;
use Illuminate\Support\Facades\Route;

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



Route::get('/', [App\Http\Controllers\DashboardController::class, 'welcome'])->middleware(['auth'])->name('welcome');

Route::get('/pelanggan', [App\Http\Controllers\PelangganController::class, 'index'])->middleware(['auth'])->name('pelanggan');
Route::get('/pelanggan/bayar', [App\Http\Controllers\PelangganController::class, 'bayar'])->middleware(['auth'])->name('bayar');
Route::get('/pelanggan/bukti-bayar/{id}', [App\Http\Controllers\PelangganController::class, 'edit_bukti_bayar'])->middleware(['auth'])->name('edit_bukti_bayar');
Route::get('/pelanggan/invoice/{id}', [App\Http\Controllers\PelangganController::class, 'invoice'])->middleware(['auth'])->name('invoice');
Route::post('/pelanggan/bukti-bayar-unggah/{id}', [App\Http\Controllers\PelangganController::class, 'upload_bukti'])->middleware(['auth'])->name('upload_bukti');

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');





Route::get('/booking/aku', [App\Http\Controllers\BookingController::class, 'index'])->middleware(['auth'])->name('booking');
Route::post('/booking/store', [App\Http\Controllers\BookingController::class, 'store'])->middleware(['auth'])->name('booking-store');
Route::get('/booking/edit/{id}', [App\Http\Controllers\BookingController::class, 'edit'])->middleware(['auth'])->name('booking-edit');
Route::post('/booking/update/{id}', [App\Http\Controllers\BookingController::class, 'update'])->middleware(['auth'])->name('booking-update');
Route::get('/booking/delete/{id}', [App\Http\Controllers\BookingController::class, 'destroy'])->middleware(['auth'])->name('booking-delete');




Route::resource('category', App\Http\Controllers\CategoryController::class);
// Route::resource('posts', App\Http\Controllers\CategoryController::class);




Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->middleware(['auth'])->name('products');
Route::post('/products/store', [App\Http\Controllers\ProductController::class, 'store'])->middleware(['auth'])->name('products-store');
Route::get('/products/edit', [App\Http\Controllers\ProductController::class, 'edit'])->middleware(['auth'])->name('products-edit');
Route::put('/products/update', [App\Http\Controllers\ProductController::class, 'update'])->middleware(['auth'])->name('products-update');
Route::delete('/products/delete', [App\Http\Controllers\ProductController::class, 'destroy'])->middleware(['auth'])->name('products-delete');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('', [AdminController::class, 'index'])->name('index');
    Route::post('store', [AdminController::class, 'store'])->name('store');
    Route::put('update', [AdminController::class, 'update'])->name('update');
    Route::delete('delete', [AdminController::class, 'delete'])->name('delete');
    Route::put('change-password', [AdminController::class, 'changePassword'])->name('change_password');
});


Route::prefix('profile')->name('profile.')->group(function () {
    Route::get('', [ProfilController::class, 'index'])->name('index');
    Route::put('update', [ProfilController::class, 'update'])->name('update');
});

require __DIR__ . '/auth.php';
