<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;


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
    public function index()
    {
        $products = Product::paginate(6);  //每5個資料作為一頁
        return view('productPage', compact('products'));
    }
}
