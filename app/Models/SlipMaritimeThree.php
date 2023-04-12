<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//ramo: maritimo
//RC PORTUARIA x
//RC ASTILLEROS x
//RC ARMADORES x

class SlipMaritimeThree extends Model
{
    use HasFactory;

    protected $fillable = [
        'coverage',
        'object_insurance',
        'limit_compensation',
        'precedent_conditions',
        'person_insured'

    ];

    public function slip()
    {
        return $this->morphMany(Slip::class, 'model');
    }

    public function object_insurance()
    {
        return $this->morphMany(ObjectInsurance::class, 'model');
    }
    public function slipType()
    {
        return $this->morphOne(SlipType::class, 'slippable');
    }
    
}
