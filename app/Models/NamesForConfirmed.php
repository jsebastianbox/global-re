<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NamesForConfirmed extends Model
{
    use HasFactory;

    protected $fillable = [
        'cobertura',
        'limiteAsegurado',
        'tasaAjuste',
        'primaBrutaUno',
        'primaPartUno',
        'dstos',
        'prima',
        'tasa',
        'primaBrutaDos',
        'primaPartDos',
        'comision',
        'comisionBq',
        'impRenta',
        'subTotal',
        'isd',
        'primaNeta',
        'feePartener',
        'feeGlobal',
        'slip_id'
    ];
}
