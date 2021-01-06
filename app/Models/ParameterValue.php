<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParameterValue extends Model
{
    use HasFactory;

    /**
     * Get the post that owns the comment.
     */
    public function parameter()
    {
        return $this->belongsTo(Parameter::class);
    }
}
