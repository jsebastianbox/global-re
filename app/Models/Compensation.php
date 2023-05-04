<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compensation extends Model
{
    use HasFactory;

    protected $fillable = [
        'Indemnizacion1',
        'Indemnizacion2',
        'Indemnizacion3',
        'slip_id'
    ];


    public function slip()
    {
        return $this->morphMany(Slip::class, 'model');
    }
}
