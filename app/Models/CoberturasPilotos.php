<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoberturasPilotos extends Model
{
    use HasFactory;

    protected $fillable = [
        'description_coverage_additional',
        'coverage_additional_usd',
        'coverage_additional_additional',
        'coverage_additional_additional2',
        'sum_assured',
        'pilots_quantity',
        'total_assured',
        'slip_id'
    ];

    public function slip()
    {
        return $this->belongsTo(Slip::class);
    }
}
