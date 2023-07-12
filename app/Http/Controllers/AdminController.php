<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\PRCategory;

class AdminController extends Controller
{
    public function index()
    {
        $categories = PRCategory::all(); // 取得所有主分類資料
        $products = Product::with('category')->paginate(6);
        return view('admin.product.productManage', compact('products', 'categories'));
    }


    public function viewAdminHome()
    {
        return view('admin.adminPage');
    }
}
