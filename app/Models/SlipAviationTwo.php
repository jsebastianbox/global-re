<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//ramo: aviacion
//PERDIDA DE LICENCIA x
class SlipAviationTwo extends Model
{
    use HasFactory;

    protected $fillable = [
        'coverage',
        'use_loss_license',
        // 'suma_asegurada_lol',
        'geography_limit',
        'suma_asegurada_lol',
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
