<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//ramo: VIDA Y ACCIDENTES PERSONALES
//VIDA INDIVIDUAL 
//VIDA COLECTIVA 
//ACCIDENTES PERSONALES INDIVIDUAL
//ACCIDENTES PERSONALES COLECTIVA

class SlipLifePersonlAccident extends Model
{
    use HasFactory;

    protected $fillable = [
        'num_insurer',
        'accumulation',
        'max_age_approve',
        'max_age_cancel',
        'compensation_since',
        'compensation_until',
        'compensation_porcentage',
        'beneficiary_death',
        'beneficiary_disability',
        'coverage_foundation',
        'people_insurer',
        'sum_insurer',
        'siniestralidad'
    ];

    public function object_insurance()
    {
        return $this->morphMany(ObjectInsurance::class, 'model');
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
