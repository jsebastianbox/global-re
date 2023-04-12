<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPerdios extends Model
{
    use HasFactory;

    protected $fillable = [
        'model_id',
        'model_type',
        'num_perdios',
        'province_perdios',
        'city_perdios',
        'direction_perdios',
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
