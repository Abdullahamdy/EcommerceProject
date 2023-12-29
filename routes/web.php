<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Frontend\FrontendController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [FrontendController::class,'index'])->name('frontend.index');
Route::get('/cart', [FrontendController::class,'cart'])->name('frontend.cart');
Route::get('/checkout', [FrontendController::class,'checkout'])->name('frontend.checkout');
Route::get('/detail', [FrontendController::class,'detail'])->name('frontend.detail');
Route::get('/shop', [FrontendController::class,'shop'])->name('frontend.shop');
Route::get('/admin/login', [BackendController::class,'login'])->name('admin.login');
Route::get('/admin/forget-password', [BackendController::class,'forget_password'])->name('admin.forget_password');
Route::get('/admin/index', [BackendController::class,'index'])->name('admin.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');