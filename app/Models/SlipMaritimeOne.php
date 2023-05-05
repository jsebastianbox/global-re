<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlipMaritimeOne extends Model
{
    use HasFactory;

    protected $fillable = [
        'object_insurance',
        'insured_sum',
        //'aplications',
        'navigation',
        'coverage',
        'agreed_value',
        'use_boat',
        'construction_material',
        'detail_boat',
        'name_armador',
        'precedent_conditions',
    ];

    public function slip()
    {
        return $this->morphMany(Slip::class, 'model');
    }

    public function boat_detail()
    {
        return $this->morphMany(BoatDetailSlip::class, 'model');
    }
    public function slipType()
    {
        return $this->morphOne(SlipType::class, 'slippable');
    }
}
