<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//ramos: maritimo
//PROTECTION AND INDEMNITY P&I

class SlipMaritimeTwo extends Model
{
    use HasFactory;

    protected $fillable = [
        'object_insurance',
        'insured_sum',
        'aplications',
        'navigation',
        'coverage',
        'limit_compensation',
        'precedent_conditions',
        'modality',
        'name_armador',
        'experience_armador',
        'detail_boat',
        'use_boat',
        'detalleViajeText',
        'construction_material',
        'agreed_value'
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
