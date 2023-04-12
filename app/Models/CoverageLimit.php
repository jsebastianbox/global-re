<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoverageLimit extends Model
{
    use HasFactory;

    protected $fillable = [
        'limit_description_coverage',
        'limit_aditional_coverage',
        'slip_id'
    ];

    public function slip()
    {
        return $this->belongsTo(Slip::class);
    }


}
