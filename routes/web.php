<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HouseController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//Route::middleware('auth')->group(function () {
    Route::get('/houses', [HouseController::class, 'index'])->name('houses.index');
    // Show details for a single house (expects an id)  
    Route::get('/houses/{id}', [HouseController::class, 'details'])->name('houses.details');
    Route::post('/houses', [HouseController::class, 'store'])->name('houses.store');
    Route::get('/houses/create', [HouseController::class, 'create'])->name('houses.create');
//});

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
// Edit product (show form)
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
// Update product (submit form)
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');


require __DIR__.'/auth.php';
