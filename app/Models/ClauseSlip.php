<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClauseSlip extends Model
{
    use HasFactory;

    protected $fillable = [
        'description_clause_additional',
        'clause_additional_additional',
        'clause_additional_additional2',
        'clause_additional_usd',
        'other',
        'slip_id'
    ];

    public function slip()
    {
        return $this->belongsTo(Slip::class);
    }
}
