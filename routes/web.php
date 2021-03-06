<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\AuthAdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;



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
    return view('beranda');
})->name('beranda');

// Route User

Route::get('/login', [AuthUserController::class, 'index'])->name('login');
Route::post('/login/auth', [AuthUserController::class, 'userLogin'])->name('userLogin');
Route::get('/main', [AuthUserController::class, 'main'])->name('main');
Route::get('/logout', [AuthUserController::class, 'userLogout'])->name('userLogout');

Route::get('/register', [AuthUserController::class, 'userRegister'])->name('register');
Route::post('/register', [AuthUserController::class, 'authRegister'])->name('register.user');

Route::get('/admin',[AuthAdminController::class, 'index'])->name('admin');
Route::post('/admin/login',[AuthAdminController::class, 'adminLogin'])->name('adminLogin');

Route::get('/dashboard', [AuthAdminController::class, 'dashboard'])->name('dashboard');
Route::get('/dashboard/table_user', [UserController::class, 'index'])->name('table_user');
Route::get('/dashboard/table_product', [ProductController::class, 'index'])->name('table_product');
Route::get('/dashboard/table_order', [OrderController::class, 'index'])->name('table_order');
Route::get('/dashboard/table_admin', [AdminController::class, 'index'])->name('table_admin');

Route::get('/add_admin',[AdminController::class, 'create'])->name('create_admin');
Route::post('/add_admin',[AdminController::class, 'store'])->name('store_admin');
Route::get('/edit_admin/{admin_id}',[AdminController::class, 'edit'])->name('edit_admin');
Route::put('/update_admin/{admin_id}',[AdminController::class, 'update'])->name('update_admin');
Route::delete('/delete/{admin_id}', [AdminController::class, 'destroy'])->name('delete_admin');

Route::get('/edit_user/{user_id}', [UserController::class, 'edit'])->name('edit_user');
Route::put('/update_user/{user_id}', [UserController::class, 'update'])->name('update_user');
Route::delete('/delete_user/{user_id}',[UserController::class, 'destroy'])->name('delete_user');

Route::get('/add_product', [ProductController::class, 'create'])->name('create_product');
Route::post('/add_product', [ProductController::class, 'store'])->name('store_product');
Route::get('/edit_product/{product_id}', [ProductController::class, 'edit'])->name('edit_product');
Route::put('/update_product/{product_id}',[ProductController::class, 'update'])->name('update_product');
Route::delete('/delete_product/{product_id}',[ProductController::class, 'destroy'])->name('delete_product');

// Route Add cart
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::post('/add_cart/{product_id}', [CartController::class, 'add_cart'])->name('add_cart');
Route::post('/add_cart', [CartController::class, 'store'])->name('store_cart');
Route::delete('/delete_cart/{product_id}', [CartController::class, 'destroy'])->name('delete_cart');

Route::post('/checkout/{user_id}', [CartController::class, 'checkout'])->name('checkout');



