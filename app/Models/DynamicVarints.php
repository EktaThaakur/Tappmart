<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DynamicVarints extends Model
{
    public $fillable = ['data'];
    //
    protected $casts = [
        'data' => 'array', // Cast JSON data as an array
    ];

    public function product()
    {
        return $this->belongsTo(product::class);
    }
}
