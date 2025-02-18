<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class product extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function pincodes()
    {
        return $this->belongsToMany(MasterPincode::class, 'pincode__products', 'product_id', 'pincode_id')
            ->withTimestamps();
    }
    public function user()
    {
        return $this->belongsToMany(User::class, 'user_products', 'pincode_products', 'user_id')
            ->withTimestamps();
    }

    public function merchange_categories()
    {
        return $this->belongsToMany(MerchantCategory::class, 'merchange_category_products', 'product_id', 'merchange_category_id')->withTimestamps();
    }

    public function productVariants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function dynamicVarints()
    {
        return $this->hasMany(DynamicVarints::class);
    }

    /**
     * Get all of the policies for the product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function policies(): HasMany
    {
        return $this->hasMany(Policy::class, 'product', 'id');
    }

    public function forms()
    {
        return $this->hasMany(FormName::class, 'product_id', 'id');
    }
}
