<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//ramo: propiedad activos fijos
//INCENDIO Y LINEAS ALIADAS x  
//LUCRO CESANTE POR INCENDIO Y LINEAS ALIADAS x
//ROBO x
//SABOTAJE Y TERRORISMO x

class SlipPropertyFixedAsset extends Model
{
    use HasFactory;

    protected $fillable = [
        'object_insurance',
        'insurable_sum',
        'limit_compensation',
        'coverage_foundation',
        'coverage',
        'type_loss_profits',
        'period_compensation',
        'th_sum_assured_1',
        'th_sum_assured_2',
        'th_sum_assured_3',
        'th_sum_assured_4',
        'th_sum_assured_5',
        'first_risk'
    ];

    public function sum_assured()
    {
        return $this->morphMany(SumAssured::class, 'model');
    }

    public function slip()
    {
        return $this->morphMany(Slip::class, 'model');
    }

    public function detail_perdios()
    {
        return $this->morphMany(DetailPerdios::class, 'model');
    }

    public function equipment_list()
    {
        return $this->morphMany(EquipmentListInsured::class, 'model');
    }
    public function slipType()
    {
        return $this->morphOne(SlipType::class, 'slippable');
    }
    
    public function sumAssured()
    {
        return $this->morphOne(SumAssured::class, 'slippable');
    }
}
