<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\Frontend\CashierController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.auth.login', ['type_menu' => 'dashboard']);
}); 

// ==================
// Dashboard umum (bisa dihapus nanti kalau gak kepake)
// ==================
Route::get('dashboard', function () {
    return view('pages.dashboard', ['type_menu' => 'dashboard']);
});


Route::resource('category', CategoryController::class);

Route::resource('food', FoodController::class);

Route::resource('dashboard', DashboardController::class);

Route::get('cashier', [CashierController::class, 'index'])->name('cashier');
Route::post('cashier/add-to-cart', [CashierController::class, 'addToCart'])->name('cart.add');

Route::get('/clear-cart', function () {
    session()->forget('cart');
    return 'Cart cleared!';
});


// Tambah qty
Route::post('cashier/cart/increase/{id}', [CashierController::class, 'increaseQty'])->name('cart.increase');

// Kurangi qty
Route::post('cashier/cart/decrease/{id}', [CashierController::class, 'decreaseQty'])->name('cart.decrease');

// Hapus item
Route::post('cashier/cart/remove/{id}', [CashierController::class, 'removeItem'])->name('cart.remove');
