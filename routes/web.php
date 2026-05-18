<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BookController as AdminBookController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/kontak', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::controller(KatalogController::class)->group(function () {
    Route::get('/katalog', 'index')->name('katalog');
    Route::get('/katalog/{slug}', 'show')->name('books.detail');
});
Route::middleware(['auth'])->group(function () {
    // Fitur Keranjang & Checkout
    Route::controller(CartController::class)->group(function () {
        Route::get('/keranjang', 'index')->name('cart.index');
        Route::post('/keranjang', 'store')->name('cart.store');
        Route::patch('/keranjang/{id}', 'update')->name('cart.update');
        Route::delete('/keranjang/{id}', 'destroy')->name('cart.destroy');
        Route::post('/checkout', 'checkout')->name('checkout');
    });
    // fitur halaman pesanan
    Route::controller(OrderController::class)->group(function () {
        Route::get('/pesanan', 'index')->name('orders.index');
        Route::get('/pesanan/riwayat', 'history')->name('orders.history');
    });

    //halaman profile
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profil', 'index')->name('profile.index');
        Route::put('/profil', 'update')->name('profile.update');
    });

});

// autentikasi admin
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('books', AdminBookController::class);
        Route::resource('users', UserController::class);
        Route::resource('categories', CategoryController::class)->except(['show']);
        Route::resource('orders', \App\Http\Controllers\Admin\OrderController::class)->only(['index', 'show', 'update','destroy']);

});
require __DIR__.'/auth.php';
