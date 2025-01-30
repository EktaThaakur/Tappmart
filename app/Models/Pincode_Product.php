<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pincode_Product extends Model
{
    protected $table = 'pincode__products';
    protected $fillable = [
        'product_id',
        'pincode_id',

    ];

    public function pincode()
    /**
     * The master pincode this product is assigned to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    {
        return $this->belongsTo(MasterPincode::class, 'pincode_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
