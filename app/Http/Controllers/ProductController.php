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
    public function allProduct()
    {
        $product = new Product;
        return view('product.all_product', [
            'category' => ProductCategory::with('subCategory')->where('is_deleted',0)->orderBy('sequence')->get(),
    }

    /**
     * get single product data by given id
     *
     * @return \Illuminate\View\View
     */
    public function singleProduct($id = 0)
    {
        $common = new Common;
        return view('product.product', [
            'aboutUsInformation' => $common->getAboutUsInformation(),
            'fieldApplication' => $common->getIndependentDataByTypeCode('FOA')
        ]);        
    }
}
