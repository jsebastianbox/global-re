<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SumAssured extends Model
{
    use HasFactory;

    protected $fillable = [
        'model_id',
        'model_type',
        'equipment_name',
        'location',
        'edification',
        'contents',
        'equipment',
        'commodity',
        'other_sum_assured',
        'slip_id'
    ];

    public function model()
    {
        return $this->morphTo();
    }
    public function slippable()
    {
        return $this->morphTo();
    }
    public function slip()
    {
        return $this->belongsTo(Slip::class);
    }
}
