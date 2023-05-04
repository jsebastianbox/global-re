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
        'Indemnizacion4',
        'Indemnizacion5',
        'Indemnizacion6',
        'Indemnizacion7',
        'Indemnizacion8',
        'Indemnizacion9',
        'Indemnizacion10',
        'Indemnizacion11',
        'Indemnizacion12',
        'Indemnizacion13',
        'Indemnizacion14',
        'Indemnizacion15',
        'Indemnizacion16',
        'Indemnizacion17',
        'Indemnizacion18',
        'Indemnizacion19',
        'Indemnizacion20',
        'Indemnizacion21',
        'Indemnizacion22',
        'Indemnizacion23',
        'Indemnizacion24',
        'Indemnizacion25',
        'Indemnizacion26',
        'Indemnizacion27',
        'Indemnizacion28',
        'Indemnizacion29',
        'slip_id'
    ];


    public function slip()
    {
        return $this->morphMany(Slip::class, 'model');
    }
}
