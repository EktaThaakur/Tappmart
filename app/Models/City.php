<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }

    public function pincode(): HasMany
    {
        return $this->hasMany(MasterPincode::class, 'city_id', 'id');
    }
    //
}
