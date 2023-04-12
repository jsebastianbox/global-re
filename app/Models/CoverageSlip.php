<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoverageSlip extends Model
{
    use HasFactory;

    protected $fillable = [
        'description_coverage',
        'aditional_coverage',
        'slip_id'
    ];

    public function slip()
    {
        return $this->belongsTo(Slip::class);
    }
}
