<?php

use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\admin\LoginController as AdminLoginController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;


Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');



// User pages
Route::get('/', [UserController::class, 'home'])->name('home');
Route::get('/about', [UserController::class, 'about'])->name('about');
Route::get('/category', [UserController::class, 'category'])->name('user.category');
Route::get('/categories/{id}', [UserController::class, 'categoryDetail'])->name('user.category.detail');
Route::get('/products', [UserController::class, 'products'])->name('products');
Route::get('/products/{id}', [UserController::class, 'productDetail'])->name('user.product.detail');
Route::get('/gallery', [UserController::class, 'gallery'])->name('gallery');
Route::get('/contact', [UserController::class, 'contact'])->name('contact');




Route::group(['prefix' => 'account'], function(){
    // Guest middleware
    Route::group(['middleware' => 'guest'], function(){
        Route::get('login',[LoginController::class,'index'])->name('account.login');
        Route::post('login',[LoginController::class,'authenticate'])->name('account.authenticate');
Route::get('logout', [LoginController::class, 'logout'])->name('account.logout');

        Route::get('register',[LoginController::class,'register'])->name('account.register');
        Route::post('register',[LoginController::class,'processRegister'])->name('account.processRegister');
    });
    
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/checkout-success', [CheckoutController::class, 'success'])->name('checkout.success');


});



Route::group(['prefix' => 'admin'], function(){
    // Guest middleware for admin
    Route::group(['middleware' => 'admin.guest'], function(){
        Route::get('login',[AdminLoginController::class,'index'])->name('admin.login');
        Route::post('login',[AdminLoginController::class,'authenticate'])->name('admin.authenticate');
    });
    // Authenticate middleware for admin
    Route::group(['middleware' => 'admin.auth'], function(){
        Route::get('dashboard',[AdminDashboardController::class,'index'])->name('admin.dashboard');
        Route::get('logout',[AdminLoginController::class,'logout'])->name('admin.logout');
          Route::resource('categories', CategoryController::class)->names('admin.categories');
    Route::resource('products', ProductController::class)->names('admin.products');
    Route::resource('orders', OrderController::class)->only(['index', 'show'])->names('admin.orders');
    });

});






