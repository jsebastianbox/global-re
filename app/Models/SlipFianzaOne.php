<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//ramo: FIANZAS
//FIDELIDAD x

class SlipFianzaOne extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_coverage_fidelidad',
        'discovery_period',
        'limit_colusorio_value', //
        'limit_colusorio_text', //
        'coverage',
        'condition_additional',
        'siniestralidad',
        'limit_aggregate', //revision
        'person_insured',
        'sum_insured',
        'quotationReport',
        'financialReport'
    ];

    public function object_insurance()
    {
        return $this->morphMany(ObjectInsurance::class, 'model');
    }

    public function slip()
    {
        return $this->morphMany(Slip::class, 'model');
    }

    public function compensation_limit()
    {
        return $this->morphMany(CompensationLimit::class, 'model');
    }
    public function slipType()
    {
        return $this->morphOne(SlipType::class, 'slippable');
    }
}
