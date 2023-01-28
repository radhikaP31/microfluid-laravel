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
     * get url slug
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

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

    /**
     * Get the feature for the product.
     */
    public function feature()
    {
        return $this->hasMany(ProductFeature::class, 'product_id', 'id');
    
    }

    /**
     * Get the application for the product.
     */
    public function application()
    {
        return $this->hasMany(ProductApplication::class, 'product_id', 'id');
    
    }

    /**
     * Get the specification for the product.
     */
    public function specification()
    {
        return $this->hasMany(ProductSpecification::class, 'product_id', 'id');
    
    }

    /**
     * Get the download for the product.
     */
    public function download()
    {
        return $this->hasMany(ProductDownload::class, 'product_id', 'id');
    
    }

    /**
     * Get the related content for the product.
     */
    public function related_content()
    {
        return $this->hasMany(ProductRelatedContent::class, 'product_id', 'id');
    
    }

}
