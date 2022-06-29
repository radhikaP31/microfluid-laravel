<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;

class ProductController extends Controller
{
    /**
     * get all product data
     *
     * @return \Illuminate\View\View
     */
    public function allProduct($id=null, $sub_cat_id=null)
    {
        if($sub_cat_id){
          $product_tab = ProductSubCategory::where('id',$sub_cat_id)->orderBy('sequence')->get(); //get sub category wise products product
          $product_data = Product::where('is_deleted',0)->where('category_id',$id)->where('sub_cat_id',$sub_cat_id)->orderBy('sequence')->get();
        }else{
          $product_tab = ProductCategory::where('is_deleted',0)->where('id',$id)->orderBy('sequence')->get(); //get category wise products product
          $product_data = Product::where('is_deleted',0)->where('category_id',$id)->orderBy('sequence')->get();
        } 

        return view('product.all_product', [
            'category_id' => $id,
            'sub_cat_id' => $sub_cat_id,
            'allCategory' => ProductCategory::with('subCategory')->where('is_deleted',0)->orderBy('sequence')->get(),
            'productData' => $product_tab,
            'product_data' => $product_data,
        ]);
    }

    /**
     * get single product data by given id
     *
     * @return \Illuminate\View\View
     */
    public function singleProduct($product_id = 0)
    {
        return view('product.product', [
            'product_id' => $product_id,
            'productData' => Product::with('image','key')->where('is_deleted',0)->where('id',$product_id)->orderBy('sequence')->first(),
        ]);        
    }
}
