<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('/products', ProductController::class, ['names' => [
    'index' => 'products.index',
    'show' => 'products.show',
    'create' => 'products.create',
    'store' => 'products.store',
    'edit' => 'products.edit',
    'update' => 'products.update',
    'destroy' => 'products.destroy',
]])->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route::get('products', [ProductController::class, 'index'])->name('products.index');    
    // Route::get('products/create', [ProductController::class, 'create'])->name('products.create');    
    // Route::post('products/', [ProductController::class, 'store'])->name('products.store');    
    // Route::get('products/{blog}', [ProductController::class, 'show'])->name('products.show');    
    // Route::get('products/{blog}/edit', [ProductController::class, 'edit'])->name('products.edit');
    // Route::put('products/{blog}', [ProductController::class, 'update'])->name('products.update');
    // Route::delete('products/{blog}', [ProductController::class, 'destroy'])->name('products.destroy');
});

require __DIR__.'/auth.php';
