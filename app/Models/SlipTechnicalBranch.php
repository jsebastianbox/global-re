<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//ramo: RAMOS TÉCNICOS 	
//EQUIPO ELECTRONICO x
//ROTURA DE MAQUINARIA x
//PERDIDA DE BENEFICIOS POR ROTURA DE MAQUINARIA x
//EQUIPO Y MAQUINARIA DE CONTRATISTAS x 
//TODO RIESGO PARA CONTRATISTAS
//MONTAJE DE MAQUINARIA x
//ALOP x

class SlipTechnicalBranch extends Model
{
    use HasFactory;

    protected $fillable = [
        'object_insurance',
        'sum_insured',
        'sum_assured',
        'limit_compensation',
        'maintenance_period',
        'type_loss_profits',
        'period_compensation',
        'type_form',
        'coverage',
        'object_insurance_detail',
        'condition_additional',

        'asegurable_electronico',
        'asegurada_electronico',
        'todo_riesgo',
        'portadores_externos',
        'incremento_costos',
        'limite_diario',
        'periodo_cobertura',
        'total_cuadro1',
        'todo_riesgo2',
        'portadores_externos2',
        'incremento_costos2',
        'total_cuadro2'
    ];

    public function slip()
    {
        return $this->morphMany(Slip::class, 'model');
    }

    public function sum_rc_assured()
    {
        return $this->morphMany(SumRcAssured::class, 'model');
    }

    public function detail_machin()
    {
        return $this->morphMany(DetailMachineRt::class, 'model');
    }

    public function compensation_limit()
    {
        return $this->morphMany(CompensationLimit::class, 'model');
    }

    public function sum_assured()
    {
        return $this->morphMany(SumAssured::class, 'model');
    }
    public function slipType()
    {
        return $this->morphOne(SlipType::class, 'slippable');
    }
}
