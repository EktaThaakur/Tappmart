<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable = ['name', 'image', 'tappsure'];
    // Relationship: ek category ke kayi products ho sakte hain
    public function products()
    {
        return $this->hasMany(Product::class);
    } //
}
