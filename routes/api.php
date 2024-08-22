<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/produtos', [ProductController::class, 'apiIndex']);
Route::get('/usuario/{id}/produtos', [ProductController::class, 'getByUser']);