<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('product.index');
    } else {
        return redirect()->route('login');
    }
});

Route::controller(ProductController::class)->group( function()  {

    // Front-end
    Route::get('/produtos', 'index')->name('product.index');
    Route::get('/novo-produto', 'create')->name('product.create');
    Route::get('/produto/{id}', 'edit')->name('product.edit');
    
    // Back-end
    Route::post('product/', 'store')->name('product.store');
    Route::put('product/{id}', 'update')->name('product.update');
    Route::delete('/product/{id}', 'destroy')->name('product.destroy');

})->middleware(['auth', 'verified']);

Route::controller(CategoryController::class)->group( function()  {

    Route::get('/categorias','index')->name('category.index');
    Route::get('/nova-categoria','create')->name('category.create');

})->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/perfil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
