<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PRCategory;
use App\Models\SubPRCategory;

class SubPRCategoryController extends Controller
{

    public function store(Request $request)
    {
            // 新增副分類的情況
            $subcategory = new SubPRCategory();
            $subcategory->category_id = $request->input('category_id');
            $subcategory->subcategory_name = $request->input('subcategory_name');
            $subcategory->save();

            // 重導回前一頁並附帶成功訊息
            return redirect()->back()->with('success', '副分類新增成功');
    }
}
