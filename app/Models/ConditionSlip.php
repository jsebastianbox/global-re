<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConditionSlip extends Model
{
    use HasFactory;

    protected $fillable = [
        'model_id',
        'model_type',
        'description_condition',
        'section_condition'
    ];

    public function model()
    {
        return $this->morphTo();
    }
}
