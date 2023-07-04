<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubPRCategory extends Model
{
    use HasFactory;

    protected $table = 'product_subcategorys';

    protected $fillable = [
        'subcategory_name',
        'category_id'
    ];

    /**
     * 定義 SubPRCategory 與 PRCategory 之間的關聯
     * 使用 belongsTo 方法，表示 SubPRCategory 模型屬於 PRCategory 模型
     * 'category_id' 是 SubPRCategory 模型中的外鍵，指向 PRCategory 模型的主鍵 'category_id'
     * 'category_id' 是 PRCategory 模型的主鍵，用於關聯兩個模型的資料
     * 這表示 SubPRCategory 模型中的 category_id 欄位與 PRCategory 模型中的 category_id 欄位相關聯
     * 這種關聯表示 SubPRCategory 模型屬於 PRCategory 模型，即每個 SubPRCategory 對應到一個 PRCategory
     */
    public function category()
    {
        return $this->belongsTo(PRCategory::class, 'category_id', 'category_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
