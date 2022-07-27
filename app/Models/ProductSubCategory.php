<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductCategory;
use App\Models\Product;

class ProductSubCategory extends Model
{
    use HasFactory;

    public $table = "web_products_sub_category";

    /**
     * Get the category that owns the Sub category.
     */
    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    /**
     * Get the product for the sub category.
     */
    public function productSubCat()
    {
        return $this->hasMany(Product::class, 'sub_cat_id', 'id');
    }

}
