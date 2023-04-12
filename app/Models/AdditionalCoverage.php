<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionalCoverage extends Model
{
    use HasFactory;

    protected $fillable = [
        'description_coverage_additional',
        'coverage_additional_usd',
        'coverage_additional_additional',
        'coverage_additional_additional2',
        'slip_id'
    ];

    public function slip()
    {
        return $this->belongsTo(Slip::class);
    }
}
