<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SumRcAssured extends Model
{
    use HasFactory;

    protected $fillable = [
        'model_id',
        'model_type',
        'description_sum_rc_assured',
        'value_sum_rc_assured'
    ];

    public function model ()
    {
        return $this->morphTo();
    }

    
}
