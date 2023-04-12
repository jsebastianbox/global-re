<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorageSlipStock extends Model
{
    use HasFactory;

    protected $fillable = [
        'value_storage_stock',
        'description_storage_stock',
        'stock_id',
        'ismerchandise',
        'port_entrance',
        'status_transport'
    ];

    public function slip_stock()
    {
        return $this->belongsTo(SlipStock::class);
    }

    
}
