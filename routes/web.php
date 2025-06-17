<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FoodController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.auth.login', ['type_menu' => 'dashboard']);
}); 

// ==================
// Dashboard umum (bisa dihapus nanti kalau gak kepake)
// ==================
Route::get('home', function () {
    return view('pages.dashboard', ['type_menu' => 'dashboard']);
});


Route::resource('category', CategoryController::class);

Route::resource('food', FoodController::class);