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

    public function subcategories()
    {
        return $this->hasMany(SubPRCategory::class, 'category_id', 'category_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
