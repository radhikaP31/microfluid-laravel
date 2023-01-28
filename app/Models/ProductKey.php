<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class ProductKey extends Model
{
    use HasFactory;

    public $table = "web_product_keys";

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope('deleted', function (Builder $builder) {
            $builder->where('is_deleted',0);
        });
    }

    /**
     * Get the category that owns the Product.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
