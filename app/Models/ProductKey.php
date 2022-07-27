<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductKey extends Model
{
    use HasFactory;

    public $table = "web_product_keys";

    /**
     * Get the category that owns the Product.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
