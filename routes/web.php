<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController; // 新增這行
use App\Http\Controllers\PRCategoryController; // 新增這行
use App\Http\Controllers\SubPRCategoryController; // 新增這行

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

//顯示產品
// Route::get('/', function () {
//     return view('productPage');
// })->name('productPage');

//主頁面
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('productPage');

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'indexProfile'])->name('profile');

// 註冊身份驗證相關路由
Auth::routes();

//登入
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');

// 管理者主頁面
Route::get('/adminPage', [ProductController::class, 'index'])->name('adminPage');

//產品顯示頁面
Route::get('/adminPage/productManage', [ProductController::class, 'indexPRM'])->name('productManage');


// --------------------------------------------
// 創建產品
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// 更新產品
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');

// 刪除產品
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

//購物車
Route::post('/add-to-cart/{product}', 'App\Http\Controllers\CartController@addToCart')->name('cart.add');

Route::get('/cart', 'App\Http\Controllers\CartController@viewCart')->name('cart.view');

// --------------------------------------------
Route::get('/adminPage/prCategory', [PRCategoryController::class, 'indexPRC'])->name('prCategory');

// 創建分類
Route::post('/categories', [PRCategoryController::class, 'store'])->name('categories.store');
// 更新分類
Route::post('/categories/{id}', [PRCategoryController::class, 'update'])->name('categories.update');

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
