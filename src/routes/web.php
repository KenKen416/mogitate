<?php

use App\Http\Controllers\ProductsListController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/products', [ProductsListController::class, 'index'])->name('products.index');
Route::get('/products/search', [ProductsListController::class, 'search'])->name('products.search');
Route::get('/products/register', [ProductsListController::class, 'register'])->name('product.register');
Route::get('/products/{id}', [ProductsListController::class, 'detail'])->name('product.detail');
Route::patch('/products/{id}/update', [ProductsListController::class, 'update'])->name('product.update');
Route::delete('/products/{id}/delete', [ProductsListController::class, 'destroy'])->name('product.destroy');
Route::post('/products/register', [ProductsListController::class, 'store'])->name('product.store');
