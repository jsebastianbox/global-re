<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleDetail extends Model
{
    use HasFactory;

    protected $fillable =[
        'model_id',
        'model_type',
        'number_vehicle',
        'plate_vehicle',
        'type_vehicle',
        'mark_vehicle',
        'model_vehicle',
        'year_vehicle',
        'chasis_vehicle',
        'passenger_vehicle',
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
