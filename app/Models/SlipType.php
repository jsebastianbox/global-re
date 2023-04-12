<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlipType extends Model
{
    use HasFactory;
    public function slippable()
    {
        return $this->morphTo();
    }
}
