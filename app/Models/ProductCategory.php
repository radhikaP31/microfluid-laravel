<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductSubCategory;
use App\Models\Product;

class ProductCategory extends Model
{
    use HasFactory;

    public $table = "web_products_category";

    /**
     * Get the sub category for the category.
     */
    public function subCategory()
    {
        return $this->hasMany(ProductSubCategory::class, 'category_id', 'id');
    }

    /**
     * Get the product for the category.
     */
    public function product()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

}
