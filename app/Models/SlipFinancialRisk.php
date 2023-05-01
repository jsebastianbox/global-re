<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//ramo: RIESGOS FINANCIEROS	
//BANCOS E INSTITUCIONES FINANCIERAS (BBB) x
//FIDELIDAD PARA INSTITUCIONES FINANCIERAS 

class SlipFinancialRisk extends Model
{
    use HasFactory;

    protected $fillable = [
        'object_insurance',
        'condition_additional',
        'siniestralidad',
        'limit_compensation',
        'limit_colusorio_value',
        'limit_colusorio_text',
        'limit_compensation',
        'limit_aggregate',
        'description_compensation_limit',
        'description_compensation_limit2',
        'description_compensation_limit3'
    ];

    public function compensation_limit()
    {
        return $this->morphMany(CompensationLimit::class, 'model');
    }

    public function condition()
    {
        return $this->morphMany(ConditionSlip::class, 'model');
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
