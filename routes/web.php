<?php

use App\Http\Middleware\Roles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Frontend\FrontendController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Backend\ProductCategoriesController;


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

Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');
Route::get('/cart', [FrontendController::class, 'cart'])->name('frontend.cart');
Route::get('/checkout', [FrontendController::class, 'checkout'])->name('frontend.checkout');
Route::get('/detail', [FrontendController::class, 'detail'])->name('frontend.detail');
Route::get('/shop', [FrontendController::class, 'shop'])->name('frontend.shop');

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => 'setLocale'
], function () {

    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::group([
            'middleware' => 'guest', 'setLocale',
        ], function () {
            Route::get('/login', [BackendController::class, 'login'])->name('login');
            Route::get('/forget-password', [BackendController::class, 'forget_password'])->name('forget_password');
        });
        Route::group(['middleware' => ['roles', 'role:admin|supervisor','setLocale']], function () {
            Route::get('/index', [BackendController::class, 'index'])->name('index');
            Route::get('/', [BackendController::class, 'index'])->name('index_route');
            Route::resource('product_categories', ProductCategoriesController::class);
            Route::resource('products',ProductController::class);
            Route::resource('tags',TagController::class);
        });
    });
});
Auth::routes(['verify' => true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
