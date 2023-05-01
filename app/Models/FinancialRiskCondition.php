<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialRiskCondition extends Model
{
    use HasFactory;

    protected $fillable = [
        'description_condition_additional',
        'condition_additional_usd',
        'condition_additional_additional',
        'condition_additional_additional2',
        'slip_id'
    ];

    public function slip()
    {
        return $this->belongsTo(Slip::class);
    }
}
