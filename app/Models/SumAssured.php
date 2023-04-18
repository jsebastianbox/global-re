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
        'machine',
        'commodity',
        'other_sum_assured',
        'other_sum_assured_1',
        'other_sum_assured_2',
        'other_sum_assured_3',
        'other_sum_assured_4',
        'other_sum_assured_5',
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
