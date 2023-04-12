<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AviacionExtras extends Model
{
    use HasFactory;

    protected $fillable = [
        'description_coverage',
        'aditional_coverage',
        'limit_description_coverage',
        'limit_aditional_coverage',
        'slip_id',
    ];

    public function slip()
    {
        return $this->belongsTo(Slip::class);
    }
}
