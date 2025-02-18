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

    public function users()
    {
        return $this->belongsToMany(User::class, 'category_users', 'category_id', 'user_id');
    }

    public function pincodes()
    {
        return $this->belongsToMany(MasterPincode::class, 'pincode__categories', 'category_id', 'pincode_id');
    }
}
