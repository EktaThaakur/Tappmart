<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Policy extends Model
{
    use HasFactory;
    protected $fillable = [
        'product',
        'content',
        'FAQ',
        'about'
    ];

    /**
     * Get the product that owns the Policy
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function prod(): BelongsTo
    {
        return $this->belongsTo(product::class, 'product', 'id');
    }
}
