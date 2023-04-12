<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteDirecto extends Model
{
    use HasFactory;

    protected $fillable = [
        'ri_bq',
        'reference',
        'country',
        'contact',
        'region',
        'position',
        'business_line',
        'excluye',
        'email',
        'phone_one',
        'phone_two',
        'phone_three',
    ];

    public $timestamps = true;
}
