<?php

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
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\UserController;

Route::get('/', [ProductController::class, 'index']);
Route::get('/products/create', [ProductController::class, 'create']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::post('/products', [ProductController::class, 'store']);
Route::put('/products/update/{id}', [ProductController::class, 'update']);
Route::get('/products/edit/{id}', [ProductController::class, 'edit']);
Route::post('/products/buy/{id}', [ProductController::class, 'buy']);
Route::delete('/products/giveback/{id}', [ProductController::class, 'giveback']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);
Route::get('/profile', [UserController::class, 'profile']);
Route::delete('/profile/{id}', [UserController::class, 'destroy']);
Route::get('/profile/edit/{id}', [UserController::class, 'edit']);
Route::put('/profile/update/{id}', [UserController::class, 'update']);
Route::get('/cart', [ProductController::class, 'cart']);
Route::get('pdf', [PdfController::class, 'pdf']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

