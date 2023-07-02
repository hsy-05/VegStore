<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubPRCategory;

class PRCategory extends Model
{
    use HasFactory;
    protected $table = 'product_categorys';

    protected $fillable = [
        'category_id',
        'category_name'
    ];

    protected static function boot()
    {
        parent::boot();

        // 在建立新使用者前觸發 creating 事件
        static::creating(function ($model) {
            $prefix = 'C';
            $randomNumber = mt_rand(1000, 9999);
            $categoryId = $prefix . $randomNumber;

            // 將生成的 user_id 設定到 $model（即 User 模型）的屬性中
            $model->setAttribute('category_id', $categoryId);
        });
    }

    public function subcategories()
{
    return $this->hasMany(SubPRCategory::class, 'category_id');
}

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}




