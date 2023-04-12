<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Security extends Model
{
    use HasFactory;

    protected $fillable = [
        //'name_reinsurer',
        'name_insurer',
        'porcentage',
        'slip_id'
    ];

    public function slip()
    {
        return $this->belongsTo(Slip::class);
    }
}
