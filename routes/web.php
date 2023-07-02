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

// 註冊身份驗證相關路由
Auth::routes();

//登入
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');

// 管理者主頁面
Route::get('/adminPage', [ProductController::class, 'index'])->name('adminPage');


Route::get('/adminPage/productManage', [ProductController::class, 'indexPRM'])->name('productManage');


// 創建產品
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// 更新產品
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');

// 刪除產品
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');


// --------------------------------------------
Route::get('/adminPage/prCategory', [PRCategoryController::class, 'indexPRC'])->name('prCategory');

// 創建分類
Route::post('/categorys', [PRCategoryController::class, 'store'])->name('categorys.store');
// 更新分類
Route::post('/categorys/{id}', [PRCategoryController::class, 'update'])->name('categorys.update');

// 創建分類
Route::post('/subcategorys', [SubPRCategoryController::class, 'store'])->name('subcategorys.store');
// --------------------------------------------

//無用
// Route::get('/welcome', function () {
//     return view('welcome');
// });

// Route::post('/products', [App\Http\Controllers\ProductController::class, 'store'])->name('products.store');


// Route::get('/', function () {
//     return view('homePage');
// })->name('home');


// ==================================================================
//                      範例
// ==================================================================
// 假設有個資料表叫做exams，而且已經有控制器（或者直接就想用控制器作法），那麼，路由可以這樣設定：
// Route::get('/exam', 'ExamController@index')->name('exam.index');
// Route::get('/exam/create', 'ExamController@create')->name('exam.create');
// Route::post('/exam/store', 'ExamController@store')->name('exam.store');
// Route::get('/exam/{id}', 'ExamController@show')->name('exam.show');
// Route::get('/exam/{id}/edit', 'ExamController@edit')->name('exam.edit');
// Route::patch('/exam/{id}', 'ExamController@update')->name('exam.update');
// Route::delete('/exam/{id}', 'ExamController@destroy')->name('exam.destroy');
// 上面的設定更可以簡化寫一行即可，如：
// Route::resource('exam' , 'ExamController')
