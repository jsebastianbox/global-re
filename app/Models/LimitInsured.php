<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LimitInsured extends Model
{
    use HasFactory;

    protected $fillable = [
        'description_limit_insured',
        'value_limit_insured',
        'other_limit_insured',
        'slip_id'
    ];

    public function slip()
    {
        return $this->belongsTo(Slip::class);
    }


}
