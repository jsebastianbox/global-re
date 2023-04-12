<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//ramo: RESPONSABILIDAD CIVIL
//EXTRACONTRACTUAL PLO
//CONTRACTUAL x
//ERRORES Y OMISIONES x
//RESPONSABILIDAD CIVIL MEDICA x
//RESPONSABILIDAD CIVIL PROFESIONAL x
//DIRECTORES Y ADMINISTRADORES x

class SlipCivilLiability extends Model
{
    use HasFactory;

    protected $fillable = [
        'object_insurance', //textarea
        'condition_additional',
        'coverage',
        'siniestralidad',
        'deductions_percent',
        'deductions_text',
        'limit_compensation',
        'limit_event',
        'limit_annual',
        'condition_additional',
        'ingress_previous_year',
        'ingress_present_year',
        'ingress_next_year',
        'value_payroll',
        'num_employee',
        'num_vehicle',
    ];

    public $timestamps = true;

    public function compensation_limit()
    {
        return $this->morphMany(CompensationLimit::class, 'model');
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
