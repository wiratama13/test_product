<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\ProductController;



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



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/filter-product', [ProductController::class, 'filter'])->name('product-filter');
Route::get('/product/create', [ProductController::class, 'create'])->name('product-create');
Route::post('/product/store', [ProductController::class, 'store'])->name('product-store');
Route::get('/product/show/{nama_produk}', [ProductController::class, 'show'])->name('product-show');
Route::get('/product/edit/{id_produk}', [ProductController::class, 'edit'])->name('product-edit');
Route::post('/product/update/{id_produk}', [ProductController::class, 'update'])->name('product-update');
Route::delete('/product/delete/{id_produk}', [ProductController::class, 'destroy'])->name('product-delete');
