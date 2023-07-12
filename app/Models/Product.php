<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $fillable = [
        'product_id',
        'category_id',
        'title',
        'description',
        'price',
        'image'
    ];

    protected static function boot()
    {
        parent::boot();

        // 在建立新使用者前觸發 creating 事件
        static::creating(function ($model) {
            $prefix = 'P';
            $randomNumber = mt_rand(1000, 9999);
            $productId = $prefix . $randomNumber;

            // 將生成的 user_id 設定到 $model（即 User 模型）的屬性中
            $model->setAttribute('product_id', $productId);
        });
    }
    public function category()
    {
        return $this->belongsTo(PRCategory::class, 'category_id', 'category_id');
    }


    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
}
