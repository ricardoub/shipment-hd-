<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    use HasFactory;

    /**
     * Get the values for the patameter.
     */
    public function values()
    {
        return $this->hasMany(ParameterValue::class);
    }
}
