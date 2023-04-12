<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailMachineRt extends Model
{
    use HasFactory;

    protected $fillable = [
        'model_id',
        'model_type',
        'type_machine',
        'mark_machine',
        'model_machine',
        'year_machine',
        'serie_machine',
        'sum_insured_machine',
    ];

    public function model()
    {
        return $this->morphTo(); 
    } 
}
