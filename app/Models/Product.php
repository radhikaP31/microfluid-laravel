<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use App\Models\ProductImage;

class Product extends Model
{
    use HasFactory;

    public $table = "web_products";

    /**
     * Get the category that owns the Product.
     */
    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    /**
     * Get the sub category that owns the Product.
     */
    public function productSubCat()
    {
        return $this->belongsTo(ProductSubCategory::class);
    }

    /**
     * Get the image for the product.
     */
    public function image()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    
    }

    /**
     * Get the keys for the product.
     */
    public function key()
    {
        return $this->hasMany(ProductKey::class, 'product_id', 'id');
    }

    /**Function to get All products from web_products table
    * @params $category_id type integer
    * @params $sub_cat_id type integer
    * @return array  
    **/
    function getProductByCategoryID($category_id=0, $sub_cat_id=0){

        if($sub_cat_id){
            $result = DB::table('web_products')->where('is_deleted',0)->where('category_id',$category_id)->where('sub_cat_id',$sub_cat_id)->orderBy('sequence')->get();
        } else {

            $result = DB::table('web_products')->where('is_deleted',0)->where('category_id',$category_id)->orderBy('sequence')->get();
        }
        return $result;
    }

    /**Function to get products from web_products,web_product_image table
    * @params $product_id type integer
    * @return array  
    **/
    function getProductDetailsByID($product_id=0) {  

        $result = DB::table('web_products')->where('is_deleted',0)->where('id',$product_id)->orderBy('sequence')->get();
        return $result; 
    }

    /**Function to get products image from web_products,web_product_image table
    * @params $product_id type integer
    * @return array  
    **/
    function getProductImagesByProductID($product_id=0) {   

        $result = DB::table('web_products')
        ->join('web_product_image', 'web_products.id', '=', 'web_product_image.product_id')
        ->where('web_products.id',$product_id)
        ->where('is_deleted',0)
        ->select('web_products.*')
        ->orderBy('sequence')
        ->get();
        return $result;
    }
}
