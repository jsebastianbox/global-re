<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//ramo: TODO RIESGO PETROLERO	
//UPSTREAM 
//DOWNSTREAM 
//RESPONSABILIDAD CIVIL 

class SlipEnergy extends Model
{
    use HasFactory;

    protected $fillable = [
        'object_insurance',
        'sum_insured',
        'limit_compensation',
        'coverage',
        'th_sum_assured_1',
        'th_sum_assured_2',
        'th_sum_assured_3',
        'th_sum_assured_4',
        'th_sum_assured_5',
        'insured_sum',
        'insurable_sum'
    ];

    public function sum_assured()
    {
        return $this->morphMany(SumAssured::class, 'model');
    }

    public function slip()
    {
        return $this->morphMany(Slip::class, 'model');
    }
    public function slipType()
    {
        return $this->morphOne(SlipType::class, 'slippable');
    }
}
