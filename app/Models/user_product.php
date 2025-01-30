<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class user_product extends Model
{
    public function Product()
    {
        return $this->belongsTo(Product::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }
    //
}
