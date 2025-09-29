<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Arahkan root langsung ke halaman products
Route::get('/', function () {
    return redirect()->route('products.index');
});

// Resource CRUD products
Route::resource('products', ProductController::class);
