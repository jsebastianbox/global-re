<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//ramo: fianza
//SERIEDAD DE OFERTA
//CUMPLIMIENTO DE CONTRATO
//BUEN USO DE ANTICIPO
//EJECUCION DE OBRA Y BUENA CALIDAD DE MATERIALES
//GARANTIAS ADUANERAS
//OTRAS GARANTIAS

class SlipFianzaTwo extends Model
{
    use HasFactory;

    protected $fillable = [
        'unsecured_obligation', //obligacion a garantizar
        'entrenched', //afianzado
        'beneficiary',
        'beneficiary_activity',
        'beneficiary_direcction',
        'usd',
        'mount_contract',
        'validity_contract',
        'counter_guarantee_detail', //detalle de contragarantia
        'coverage',
        //slip no finanzas
        'object_insurance',
        'condition_additional',
        'siniestralidad',

        'type_fianza',
        'mount_fianza',
        'from_date_mount_fianza',
        'to_date_mount_fianza',
        'from_date_mount_contract',
        'to_date_mount_contract',
        'contract_percentage',


        //tipo de finanza
    ];

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
