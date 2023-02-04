<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Common;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;

use function Psy\debug;

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
          $product_tab = ProductSubCategory::where(['id' => $sub_cat_id,'is_deleted' => 0])->orderBy('sequence')->get(); //get sub category wise products product
          $product_data = Product::where('is_deleted',0)->where('category_id',$id)->where('sub_cat_id',$sub_cat_id)->orderBy('sequence')->get();
        }else{
          $product_tab = ProductCategory::where('is_deleted',0)->where('id',$id)->orderBy('sequence')->get(); //get category wise products product
          $product_data = Product::where('is_deleted',0)->where('category_id',$id)->orderBy('sequence')->get();
        }
        // dd(ProductCategory::with('subCategory')->where('is_deleted', 0)->orderBy('sequence')->toSql());
        // die;
        return view('product.allProducts', [
            'category_id' => $id,
            'sub_cat_id' => $sub_cat_id,
            'allCategory' => ProductCategory::with('subCategory')->where(['is_deleted'=>0])->orderBy('sequence')->get(),
            'productData' => $product_tab,
            'product_data' => $product_data,
        ]);
    }

    /**
     * get single product data by given id
     *
     * @return \Illuminate\View\View
     */
    public function singleProduct($slug = null)
    {
        if($slug == null){
            return redirect(route('home'));
        }
        $product_id = Product::select('id')->where('slug',$slug)->first()->id;
        $common = new Common();
        $productData = Product::with('image','key')->where('is_deleted',0)->where('id',$product_id)->orderBy('sequence')->first();
        //get product nav details
        $navDetails = [];
        foreach($productData->key as $key => $keyDetails){
            $navDetails[$keyDetails->tab_name] = $common->getProductKeyDetailsByID($product_id,$keyDetails->db_table_name);
        }

        return view('product.singleProduct', [
            'product_id' => $product_id,
            'productData' => $productData,
            'navDetails' => $navDetails,
        ]);
    }
}
