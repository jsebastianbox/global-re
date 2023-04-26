<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//ramo: aviacion
//CASCO  AEREO x
//RESPONSABILIDAD CIVIL 

class SlipAviationOne extends Model
{
    use HasFactory;

    protected $fillable = [
        'object_insurance',
        'use_aerial',
        'geography_limit',
        'limit_compensation',
        'type_aviation',
        'coverage',
        'coverage_limit',
        'pilot_authorized',
        'time_model_mark'
    ];

    public function information_aerial()
    {
        return $this->hasMany(InformationAerialHelmets::class,'slip_aviation_one_id');
    }

    public function slip()
    {
        return $this->morphMany(Slip::class, 'model');
    }

    public function coverage()
    {
        return $this->hasMany(CoverageSlip::class, 'slip_id');
    }
    public function slipType()
    {
        return $this->morphOne(SlipType::class, 'slippable');
    }
}
