<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalculationModal extends Model
{
    use HasFactory;

    protected $fillable = [
        'isd',
        'impRenta',
        'ciaSeguros',
        'comGloba',
        'ciaPartner',
        'comBq',
        'slip_id'
    ];

    public function slip(){
        return $this->hasOne(Slip::class);
    }
}
