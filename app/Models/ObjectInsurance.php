<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjectInsurance extends Model
{
    use HasFactory;

    //en el slip fidelidad el campo 'cargo' es la columna 'activity_merchant'

    protected $fillable = [
        'model_id',
        'model_type',
        'type',
        'object_model',
        'number',
        'name',
        'birthday',
        'activity_merchant',
        'sex_merchant',
        'age',
        'brand',
        'limit',
        'year',
        'object_insured_val',
        'serie',
        'slip_id'
    ];

    public function model()
    {
        return $this->morphTo();
    }
    public function slip()
    {
        return $this->belongsTo(Slip::class);
    }
}
