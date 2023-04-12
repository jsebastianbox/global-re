<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PonderacionCost extends Model
{
    use HasFactory;

    protected $fillable = [
        'partPonderada',
        'ponderad',
        'tasaNetaReaseg',
        'tasaBrutaReaseg',
        'comision',
        'slip_id'
    ];
}
