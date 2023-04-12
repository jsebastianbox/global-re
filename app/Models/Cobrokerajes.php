<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cobrokerajes extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'country_id',
        'broker_local',
        'assignor', //cedente
        'sector',
        'receding', //retrocedente
        'insurance_intermediary', //intermediario de seguro
        'insured', //asegurado
        'direction',
        'activity', //actividad
        'coin',
        'equivalence', //tipo de cambio
        'validity_since',
        'validity_until',
        'insurance_object', //objeto del seguro
    ];
}
