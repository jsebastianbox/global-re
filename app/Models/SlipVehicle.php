<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//ramo: VEHICULOS 	
//VEHICULOS LIVIANOS 
//VEHICULOS PESADOS 

class SlipVehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'object_insurance',
        'use_vehicle',
        'coverage',
        'sum_insured'
    ];

    public function slip()
    {
        return $this->morphMany(Slip::class, 'model');
    }

    public function vehicle_detail()
    {
        return $this->morphMany(VehicleDetail::class, 'model');
    }
}
