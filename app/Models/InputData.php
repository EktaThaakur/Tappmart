<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InputData extends Model
{
    public function FormName()
    {
        return $this->belongsTo(FormName::class);
    }
    //
}
