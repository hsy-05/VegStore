<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\PRCategory;

class HomeController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()  //將中介層加入控制器
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('admins')->only('indexAdminHome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    // 主頁面
    public function index()
    {
        $categories = PRCategory::all(); // 取得所有主分類資料
        $products = Product::with('category')->paginate(6);
        return view('home.product.productPage', compact('products', 'categories'));
    }

}
