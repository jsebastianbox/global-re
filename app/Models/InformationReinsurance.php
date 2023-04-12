<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformationReinsurance extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_insurer',
        'sumaAsegurada',
        'participacion',
        'tasaBruta',
        'dstos',
        'tasaNeta',
        'primaNeta',
        'primaPart',
        'slip_id'
    ];

    public function slip(){
        return $this->belongsTo(Slip::class);
    }
}
