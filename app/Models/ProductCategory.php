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

    /**Function to get All products from web_products_category table
    * @return array  
    **/
    function getAllProductCategories() {

        $result = ProductCategory::where('is_deleted',0)->orderBy('sequence')->get();
        return $result;
    }

    /**Function to get products category data from web_products_category table
    * @params $category_id type integer
    * @return array  
    **/
    function getProductCategoryDataByCatID($category_id=0) {

        $result = ProductCategory::where('is_deleted',0)->where('id',$category_id)->orderBy('sequence')->get();
        return $result;
    }
}
