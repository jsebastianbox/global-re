<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformationAerialHelmets extends Model
{
    use HasFactory;

    protected $fillable = [
        /* 'model_id',
        'model_type', */
        'type_ala_aerial',
        'serie_aerial',
        'marca_aerial',
        'model_aerial',
        'year_manufacture_aerial',
        'cap_crew',
        'cap_pax',
        'sum_insured',
        'deducible_aerial',
        'slip_aviation_one_id',
        'slip_id'
    ];

    /* public function model()
    {
        return $this->morphTo();
    } */

    public function slip()
    {
        return $this->belongsTo(Slip::class);
    }
}
