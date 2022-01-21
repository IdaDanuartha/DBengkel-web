<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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

// Home
Route::get('/', [HomeController::class, 'index'])->name('/');
Route::get('/category', [HomeController::class, 'category']);
Route::get('/all-products', [HomeController::class, 'allProducts']);
Route::get('/category/{slug}', [HomeController::class, 'viewCategories']);
Route::get('/category/{cate_slug}/{prod_slug}', [HomeController::class, 'viewProduct']);

Route::get('/product-autocomplete', [HomeController::class, 'ajaxAutocomplete']);

// Login
Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'auth']);

// Logout
Route::post('/logout', [LoginController::class, 'logout']);

// Register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// Count cart
Route::get('/load-cart', [CartController::class, 'cartCount']);

// Add to cart
Route::post('/add-to-cart', [CartController::class, 'addProduct']);
// Delete cart items
Route::post('delete-cart-item', [CartController::class, 'deleteProduct']);
// Update cart quantity
Route::post('update-cart', [CartController::class, 'updateCart']);

Route::middleware(['auth'])->group(function () {
    // Cart page
    Route::get('/carts', [CartController::class, 'cartView']);

    // Checkout page
    Route::get('/checkout', [CheckoutController::class, 'index']);

    // placeorder
    Route::post('/placeorder', [CheckoutController::class, 'placeorder']);

    // My Order
    Route::get('/my-orders', [UserController::class, 'index']);
    Route::get('/order-details/{id}', [UserController::class, 'viewDetails']);
});


Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Category Dashboard
    Route::get('/dashboard/categories', [CategoryController::class, 'index']);
    Route::get('/dashboard/category/create', [CategoryController::class, 'create']);
    Route::post('/dashboard/category/insert', [CategoryController::class, 'insert']);
    Route::get('/dashboard/category/edit/{id}', [CategoryController::class, 'edit']);
    Route::put('/dashboard/category/update/{id}', [CategoryController::class, 'update']);
    Route::get('/dashboard/category/destroy/{id}', [CategoryController::class, 'destroy']);

    // Product Dashboard
    Route::get('/dashboard/products', [ProductController::class, 'index']);
    Route::get('/dashboard/product/create', [ProductController::class, 'create']);
    Route::post('/dashboard/product/insert', [ProductController::class, 'insert']);
    Route::get('/dashboard/product/edit/{id}', [ProductController::class, 'edit']);
    Route::put('/dashboard/product/update/{id}', [ProductController::class, 'update']);
    Route::get('/dashboard/product/destroy/{id}', [ProductController::class, 'destroy']);
});
