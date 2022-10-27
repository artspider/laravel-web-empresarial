<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', function () {
  return view('welcome');
});

Route::get('/user', [UserController::class, 'index']);


Route::resource('supplier', App\Http\Controllers\SupplierController::class);

Route::resource('product', App\Http\Controllers\ProductController::class);

Route::resource('unit', App\Http\Controllers\UnitController::class);

Route::resource('category', App\Http\Controllers\CategoryController::class);

Route::middleware(['auth'])->get('/home', function () {
  return view('home');
})->name('home');








