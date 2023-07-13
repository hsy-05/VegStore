<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController; // 新增這行
use App\Http\Controllers\PRCategoryController; // 新增這行
use App\Http\Controllers\SubPRCategoryController; // 新增這行
use App\Http\Controllers\CartController; // 新增這行


// 註冊身份驗證相關路由
Auth::routes();

//主頁面
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('productPage');

//登入
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');

//會員資料
Route::get('/profile', [App\Http\Controllers\Auth\ProfileController::class, 'index'])->name('profile');

// 管理者主頁面
Route::get('/adminPage', [App\Http\Controllers\AdminController::class, 'viewAdminHome'])->name('adminPage');

//產品管理頁面
Route::get('/adminPage/productManage', [App\Http\Controllers\AdminController::class, 'index'])->name('productManage');


// --------------------------------------------
// 創建產品
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// 更新產品
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');

// 刪除產品
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');


// --------------------------------------------
//購物車
Route::post('/add-to-cart/{product}', 'App\Http\Controllers\CartController@addToCart')->name('cart.add');
Route::post('/cart/decrease/{product}', 'App\Http\Controllers\CartController@decreaseQuantity')->name('cart.decrease');
Route::post('/cart/increase/{product}', 'App\Http\Controllers\CartController@increaseQuantity')->name('cart.increase');

Route::get('/cart', 'App\Http\Controllers\CartController@viewCart')->name('cart.view');

Route::delete('/cart/remove/{productId}', [App\Http\Controllers\CartController::class, 'removeFromCart'])->name('cart.remove');

// --------------------------------------------

// 創建分類
Route::post('/categories', [PRCategoryController::class, 'store'])->name('categories.store');
// 更新分類
Route::post('/categories/{id}', [PRCategoryController::class, 'update'])->name('categories.update');

//副分類
Route::get('/adminPage/prCategory', [PRCategoryController::class, 'index'])->name('prCategory');
// 創建副分類
Route::post('/subcategories', [SubPRCategoryController::class, 'store'])->name('subcategories.store');
// --------------------------------------------

//無用
// Route::get('/welcome', function () {
//     return view('welcome');
// });

// Route::post('/products', [App\Http\Controllers\ProductController::class, 'store'])->name('products.store');


// Route::get('/', function () {
//     return view('homePage');
// })->name('home');
