<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //     public function __construct()  //將中介層加入控制器
    // {
    //     $this->middleware('admin');
    // }
    public function index()
    {
        return view('admin.adminPage');
    }
    public function indexPRM()
    {
        $products = Product::paginate(6);  //每5個資料作為一頁
        return view('admin.productManage', compact('products'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();

        // 檢查路徑是否存在，若不存在則建立路徑
        if (!file_exists('uploads/postsImage')) {
            mkdir('uploads/postsImage', 0755, true);
        }

        // 檢查是否有上傳圖片
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = public_path('images\uploads\productImage\\'); // 取得 public 目錄的完整路徑
            $fileName = time() . '.' . $file->getClientOriginalExtension(); // 取得上傳檔案的副檔名
            $file->move($path, $fileName); // 將檔案移動到指定路徑
        } else {
            $fileName = 'default.jpg'; // 若沒有上傳圖片，使用預設圖片
        }

        // 將表單欄位資料設定到 Product 物件的屬性中
        $product->category_id = $request->input('category_id');
        $product->subcategory_id = $request->input('subcategory_id');
        $product->price = $request->input('price');
        $product->title = $request->input('title');
        $product->description = $request->input('description');
        $product->image = $fileName;

        // 將資料存入資料庫
        $product->save();

        // 檢查請求的方法是否為 POST，若不是則回傳 404 錯誤
        if (!$request->isMethod('POST')) {
            return abort(404);
        }

        // 重導回前一頁並附帶成功訊息
        return redirect()->back()->with('success', '產品新增成功');
    }

    public function update(Request $request, $id)
    {
        // 根據提供的 $id 取得要更新的產品
        $product = Product::find($id);

        // 檢查是否有新的圖片上傳
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // 刪除舊的圖片，如果存在的話
            if ($product->image) {
                Storage::delete('public/images/uploads/productImage/' . $product->image);
            }

            // 上傳新的圖片並儲存
            $file = $request->file('image');
            $path = public_path('images\uploads\productImage\\'); // 取得 public 目錄的完整路徑
            $fileName = time() . '.' . $file->getClientOriginalExtension(); // 取得上傳檔案的副檔名
            $file->move($path, $fileName); // 將檔案移動到指定路徑
            $product->image = $fileName;
        }

        // 更新產品的資料
        $product->category_id = $request->input('category_id');
        $product->price = $request->input('price');
        $product->title = $request->input('title');
        $product->description = $request->input('description');

        // 儲存更新後的產品資料
        $product->save();

        // 返回產品列表或其他相應視圖
        return redirect()->route('productManage')->with('success', '產品更新成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 根據提供的 $id 取得要刪除的產品
        $product = Product::find($id);

        if ($product->image != 'default.jpg')
            @unlink('images\uploads\productImage\\' . $product->image);
        $product->delete();

        return redirect()->back()->with('success', '產品刪除成功');
    }
}
