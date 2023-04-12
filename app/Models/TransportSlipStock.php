<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransportSlipStock extends Model
{
    use HasFactory;

    protected $fillable = [
        'value_transport_stock',
        'description_transport_stock',
        'stock_id'
    ];

    public function slip_stock()
    {
        return $this->belongsTo(SlipStock::class);
    }
}
