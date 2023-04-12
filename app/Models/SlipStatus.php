<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlipStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'slip_status'
    ];

    public function slipStatus()
    {
        return $this->belongsTo(Slip::class);
    }
    public function slipType()
    {
        return $this->morphOne(SlipType::class, 'slippable');
    }
}
