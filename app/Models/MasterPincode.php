<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MasterPincode extends Model
{
    protected $table = 'master_pincodes';

    // protected $fillable = ['pincodes'];

    //belongs to product
    public function product()
    {
        return $this->belongsToMany(product::class, 'pincode__products', 'pincode_id', 'product_id');
    }

    public function cities(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
}
