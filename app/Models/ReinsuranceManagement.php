<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReinsuranceManagement extends Model
{
    use HasFactory;

    protected $fillable = [
        'subscriber',
        'percentage',
        'observation',
        'reinsurance_id',
        'slip_id'
    ];

    public function resagurador()
    {
        return $this->belongsTo(Reinsurers::class, 'reinsurance_id');
    }

    public function slip()
    {
        return $this->belongsTo(Slip::class, 'slip_id');
    }
}
