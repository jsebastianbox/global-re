<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExclusionSlip extends Model
{
    use HasFactory;

    protected $fillable = [
        'description_exclusion_additional',
        'exclusion_additional_additional',
        'exclusion_additional_usd',
        'exclusion_additional_additional2',
        'slip_id'
        /* 'description_exclusion',
        'other',
        'slip_id' */
    ];

    public function slip()
    {
        return $this->belongsTo(Slip::class);
    }
}
