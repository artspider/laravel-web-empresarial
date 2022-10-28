<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
  return view('welcome');
});

Route::get('/user', [UserController::class, 'index']);

Route::middleware(['auth'])->get('/home', function () {
  return view('home');
})->name('home');

Route::get('/contenedor', function() {
  return view('contenedor');
});


Route::resource('supplier', App\Http\Controllers\SupplierController::class);

Route::resource('product', App\Http\Controllers\ProductController::class);

Route::resource('unit', App\Http\Controllers\UnitController::class);

Route::resource('category', App\Http\Controllers\CategoryController::class);

Route::resource('recipe', App\Http\Controllers\RecipeController::class);

Route::resource('recipecategory', App\Http\Controllers\RecipecategoryController::class);

Route::resource('dish', App\Http\Controllers\DishController::class);

Route::resource('order', App\Http\Controllers\OrderController::class);

Route::resource('recipebase', App\Http\Controllers\RecipebaseController::class);

Route::resource('customer', App\Http\Controllers\CustomerController::class);

Route::resource('paymethod', App\Http\Controllers\PaymethodController::class);
