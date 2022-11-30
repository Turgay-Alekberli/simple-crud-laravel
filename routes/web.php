<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

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

Route::get('/', [MainController::class, 'index'])->name('index');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::post('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
// with products
Route::get('/categories/{id}/products', [CategoryController::class, 'category_products'])->name('category_products');

Route::prefix('products')->controller(ProductController::class)->group(function () {
    Route::get('/', 'index')->name('products.index');
    Route::get('/create', 'create')->name('products.create');
    Route::post('/', 'store')->name('products.store');
    Route::get('/{id}/edit', 'edit')->name('products.edit');
    Route::post('/{id}', 'update')->name('products.update');
    Route::delete('/{id}', 'destroy')->name('products.destroy');
});

Route::get('/vue', [MainController::class, 'vue']);
