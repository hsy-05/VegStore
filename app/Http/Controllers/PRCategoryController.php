<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PRCategory;
use App\Models\SubPRCategory;

class PRCategoryController extends Controller
{
    public function index()
    {
        $categories = PRCategory::with('subcategories')->paginate(6);

        return view('admin.product.productCategory', compact('categories'));
    }

    public function store(Request $request)
    {
        $category = new PRCategory();

        $category->category_name = $request->input('category_name');
        // 將資料存入資料庫
        $category->save();

        // 檢查請求的方法是否為 POST，若不是則回傳 404 錯誤
        if (!$request->isMethod('POST')) {
            return abort(404);
        }

        // 重導回前一頁並附帶成功訊息
        return redirect()->back()->with('success', '分類新增成功');
    }

    public function update(Request $request, $id)
    {
        // 根據提供的 $id 取得要更新的產品
        $category = PRCategory::find($id);

        // 更新產品的資料
        $category->category_name = $request->input('category_name');
        // 儲存更新後的產品資料
        $category->save();

        // 返回產品列表或其他相應視圖
        return redirect()->back()->with('success', '分類更新成功');
    }
}
