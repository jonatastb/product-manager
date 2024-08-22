<?php

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

    Route::get('/meus-produtos', 'index')->name('product.index');
    Route::get('/novo-produto', 'create')->name('product.create');
    Route::post('/new-product', 'store')->name('product.store');
    Route::get('/produto/{id}', 'edit')->name('product.edit');
    Route::put('/product/{id}', 'update')->name('product.update');
    Route::delete('/produto/{id}', 'destroy')->name('product.destroy');

})->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/perfil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
