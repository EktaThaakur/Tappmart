<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MerchantCategory extends Model
{
    protected $table = 'merchant_categories';

    public function products()
    {
        return $this->belongsToMany(Product::class, 'merchange_category_products', 'merchange_category_id', 'product_id')->withTimestamps();
    }

    //
}
