<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\PRCategory;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function viewCart()
    {
        // 從會話中獲取購物車資料，如果沒有則設定為空陣列
        $cart = session('cart', []);

        // 初始化產品陣列和總價格變數
        $products = [];
        $totalPrice = 0;

        // 遍歷購物車陣列，獲取每個產品的資訊和數量
        foreach ($cart as $productId => $quantity) {
            // 根據產品ID從資料庫中查詢相應的產品資料
            $product = Product::find($productId);

            // 檢查是否找到有效的產品資料
            if ($product) {
                // 設定產品的數量屬性並計算小計
                $quantity = (int) $cart[$product->id]['quantity'];
                $product->subtotal = $product->price * $quantity;

                // 將產品添加到產品陣列中
                $products[] = $product;

                // 累計小計到總價格
                $totalPrice += $product->subtotal;
            }
        }
        // 返回cart視圖並傳遞產品陣列和總價格變數
        return view('home.product.cart', compact('products', 'totalPrice', 'cart'));
    }


    public function addToCart(Product $product)
    {
        $cart = Session::get('cart', []); // 從 session 中取得購物車資料，預設為空陣列

        // 檢查購物車中是否已存在相同產品
        if (isset($cart[$product->id])) {
            // 若存在，增加數量
            $cart[$product->id]['quantity'] += 1;
        } else {
            // 若不存在，新增資料
            $cart[$product->id] = [
                'product_id' => $product->id,
                'quantity' => 1,
                'price' => $product->price, // 新增價格屬性
            ];
        }

        Session::put('cart', $cart); // 將更新後的購物車資料存入 session

        return redirect()->back()->with('success', '產品已加入購物車！');
    }

    public function removeFromCart($productId)
    {
        $cart = Session::get('cart', []);

        // 檢查購物車中是否存在指定產品
        if (isset($cart[$productId])) {
            unset($cart[$productId]); // 從購物車中移除產品
        }

        Session::put('cart', $cart); // 更新購物車資料

        return redirect()->back()->with('success', '產品已從購物車中刪除！');
    }
}
