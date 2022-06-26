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

    /**Function to get All products sub category from web_products_sub_category table
    * @params $category_id type integer
    * @return array  
    **/
    function getProductSubCategoryByCategoryID($category_id=0) {

        $result = ProductSubCategory::where('is_deleted',0)->where('category_id',$category_id)->orderBy('sequence')->get();
        return $result;
    }

    /**Function to get products sub category details by product_sub_cat_id from web_products_sub_category table
    * @params $sub_cat_id type integer
    * @return array  
    **/
    function getProductSubCategoryDataBySubCatID($sub_cat_id=0) {

        $result = ProductSubCategory::where('id',$sub_cat_id)->orderBy('sequence')->get();
        return $result;
    }
}
