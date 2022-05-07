<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PurchaseController;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\SalesController;
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

Route::get('/', function () {
    return Inertia::render('Auth/Register', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');

    Route::get('/products', [ProductController::class, 'index'])->name('products');
    Route::get('/product/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('products.store');

    Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers');
    Route::get('/supplier/create', [SupplierController::class, 'create'])->name('supplier.create');
    Route::post('/supplier/store', [SupplierController::class, 'store'])->name('supplier.store');

    Route::get('/customers', [CustomerController::class, 'index'])->name('customers');

    Route::get('/warehouse', [WarehouseController::class, 'index'])->name('warehouse');
//    Route::post('/warehouse/create', [WarehouseController::class, 'create'])->name('warehouse.create');
    Route::post('/warehouse/store', [WarehouseController::class, 'store'])->name('warehouse.store');

    Route::get('/purchases', [PurchaseController::class, 'index'])->name('purchases');
    Route::get('/purchases/create', [PurchaseController::class, 'index'])->name('purchases.create');
    Route::post('/purchases/store', [PurchaseController::class, 'index'])->name('purchases.store');

    Route::get('/sales', [SalesController::class, 'index'])->name('transactions');
    Route::post('/sales', [SalesController::class, 'store'])->name('transactions.create');



});

