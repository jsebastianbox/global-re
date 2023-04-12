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
        'coverage'
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
