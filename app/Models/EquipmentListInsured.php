<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipmentListInsured extends Model
{
    use HasFactory;

    protected $fillable = [
        'model_id',
        'model_type',
        'name_equipment'
    ];

    public function model()
    {
        return $this->morphTo();
    }
}
