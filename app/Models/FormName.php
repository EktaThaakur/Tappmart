<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormName extends Model
{
    public function Inputdata()
    {
        return $this->hasMany(InputData::class);
    } //

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
