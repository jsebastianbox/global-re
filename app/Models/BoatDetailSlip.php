<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoatDetailSlip extends Model
{
    use HasFactory;

    protected $fillable = [
        'model_id',
        'model_type',
        'name_boat',
        'registration_boat',
        'material_boat',
        'manga_boat',
        'eslora_boat',
        'puntual_boat',
        'shell_boat',
        'machine_boat',
        'deducible_boat',
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
