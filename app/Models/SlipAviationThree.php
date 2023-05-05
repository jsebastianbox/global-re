<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlipAviationThree extends Model
{
    use HasFactory;

    protected $fillable = [
        'object_insurance',
        'valor_asegurado',
        'type_aviation',
        'use_aerial',
        'geography_limit',
        'limit_compensation'
    ];

    public function object_insurance()
    {
        return $this->morphMany(ObjectInsurance::class, 'model');
    }

    public function slip()
    {
        return $this->morphOne(Slip::class, 'model');
    }
    public function slipType()
    {
        return $this->morphOne(SlipType::class, 'slippable');
    }
}
