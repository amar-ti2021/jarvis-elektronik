<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProcurementController;

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

Route::get('/', function () {
    $data = [
        'title' => 'Dashboard',
        'active' => 'dashboard'
    ];
    return view('welcome', $data);
})->name('dashboard')->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/accounts', [AccountController::class, 'index'])->middleware('auth');
Route::get('/employees', [EmployeeController::class, 'index'])->middleware('auth');

Route::get('/products', [ProductController::class, 'index'])->middleware('auth');
Route::get('/vendors', [VendorController::class, 'index'])->middleware('auth');

Route::get('/orders', [OrderController::class, 'index'])->middleware('auth');
Route::get('/orders/create', [OrderController::class, 'create'])->middleware('auth');
Route::post('/orders/cart', [OrderController::class, 'addToCart']);
Route::post('/orders/update-cart', [OrderController::class, 'updateCart']);
Route::post('/orders/clear', [OrderController::class, 'clearAllCart']);
Route::post('/orders/save', [OrderController::class, 'save']);
Route::get('/orders/{order}', [OrderController::class, 'detailOrder'])->middleware('auth');

Route::get('/procurements', [ProcurementController::class, 'index'])->middleware('auth');
