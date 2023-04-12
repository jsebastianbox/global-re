<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompensationLimit extends Model
{
    use HasFactory;

    protected $fillable = [
        'limit_event',
        'limit_annual',
        'description_compensation_limit',
        'value_compensation_limit',
        'slip_id'
    ];

    public function model()
    {
        return $this->morphTo();
    }
}
