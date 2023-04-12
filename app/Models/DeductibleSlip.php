<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeductibleSlip extends Model
{
    use HasFactory;

    protected $fillable = [
        //'desciption_deductible',
        'description_deductible',
        'sinister_value',
        'insured_value',
        'minimum',
        'description2_deductible', //juanse
        'slip_id'
    ];

    public function slip()
    {
        return $this->belongsTo(Slip::class);
    }
}
