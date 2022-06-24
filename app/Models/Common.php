<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Common extends Model
{
    use HasFactory;

    public $table = "independent_mst";

    /*function for get master data by type code
    * @params varchar type $type_code
    * @return array
    */
    public function getIndependentDataByTypeCode($type_code=''){

        $result = DB::table('independent_mst')->where('type_cd',$type_code)->orderBy('sequence')->get();
        return $result;
    }

    /**Function to get clients from web_clients table
    * @return array  
    **/
    function getOurClients() {

        $result = DB::table('web_clients')->where('is_deleted',0)->orderBy('sequence')->get();
        return $result;
    }

    /**Function to get All About us information from web_about_info table
    * @return array  
    **/
    function getAboutUsInformation() {

        $result = DB::table('web_about_info')->where('is_deleted',0)->orderBy('sequence')->get();
        return $result;
    }

    /**Function to get All products from web_products_category table
    * @return array  
    **/
    function getAllProductCategories() {

        $result = DB::table('web_products_category')->where('is_deleted',0)->orderBy('sequence')->get();
        return $result;
    }

    /**Function to get products category data from web_products_category table
    * @params $category_id type integer
    * @return array  
    **/
    function getProductCategoryDataByCatID($category_id=0) {

        $result = DB::table('web_products_category')->where('is_deleted',0)->where('id',$category_id)->orderBy('sequence')->get();
        return $result;
    }

    /**Function to get All products sub category from web_products_sub_category table
    * @params $category_id type integer
    * @return array  
    **/
    function getProductSubCategoryByCategoryID($category_id=0) {

        $result = DB::table('web_products_sub_category')->where('is_deleted',0)->where('category_id',$category_id)->orderBy('sequence')->get();
        return $result;
    }

    /**Function to get products sub category details by product_sub_cat_id from web_products_sub_category table
    * @params $sub_cat_id type integer
    * @return array  
    **/
    function getProductSubCategoryDataBySubCatID($sub_cat_id=0) {

        $result = DB::table('web_products_sub_category')->where('id',$sub_cat_id)->orderBy('sequence')->get();
        return $result;
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

    /**Function to get products keys from web_product_keys table
    * @params $product_id type integer
    * @return array  
    **/
    function getProductKeysByProductID($product_id=0) {   


        $sql = '';
        if($product_id) {
            $result = DB::table('web_product_keys')->where('is_deleted',0)->where('product_id',$product_id)->get();
        } else {
            $result = DB::table('web_product_keys')->where('is_deleted',0)->whereNull('product_id')->get();
        }

        return $result;
    }
}
