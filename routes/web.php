<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\AuthAdminController;
use App\Http\Controllers\UserController;
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
    return view('beranda');
});

// Route User

Route::get('/login', [AuthUserController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthUserController::class, 'userLogin']);
Route::get('/main', [AuthUserController::class, 'main'])->name('main');

Route::post('/logout', [AuthUserController::class, 'userLogout'])->name('logout');

Route::get('/register', [AuthUserController::class, 'userRegister'])->name('register');
Route::post('/register', [AuthUserController::class, 'authRegister'])->name('register.user');

Route::get('/admin',[AuthAdminController::class, 'index'])->name('admin')->name('admin');
Route::post('/admin/login',[AuthAdminController::class, 'adminLogin'])->name('adminLogin');

Route::get('/dashboard', [AuthAdminController::class, 'dashboard'])->name('dashboard');
Route::get('/dashboard/table_user', [UserController::class, 'index'])->name('table_user');
Route::get('/dashboard/table_product', [ProductController::class, 'index'])->name('table_product');
Route::get('/dashboard/table_order', [OrderController::class, 'index'])->name('table_order');

Route::get('/edit_user/{user_id}', [UserController::class, 'edit'])->name('edit_user');
Route::put('/update_user/{user_id}', [UserController::class, 'update'])->name('update_user');
Route::delete('/delete_user/{user_id}',[UserController::class, 'destroy'])->name('delete_user');

Route::get('/add_product', [ProductController::class, 'create'])->name('create_product');
Route::post('/add_product', [ProductController::class, 'store'])->name('store_product');
Route::get('/edit_product/{product_id}', [ProductController::class, 'edit'])->name('edit_product');
Route::put('/update_product/{product_id}',[ProductController::class, 'update'])->name('update_product');
Route::delete('delete_product/{product_id}',[ProductController::class, 'destroy'])->name('delete_product');



