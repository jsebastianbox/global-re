<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuaranteePayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'num_day',
        'installation',
        'date_payment',
        'description',
        'valor'
    ];

    public function slip()
    {
        return $this->belongsTo(Slip::class);
    }
}
