<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//ramo: maritimo (tranporte)
//INTERNO x
//EXPORTACIONES x
//IMPORTACIONES x
//STOCK THROUGHPUT STP x
//TRANSPORTE DE DINERO 

class SlipMaritimeFour extends Model
{
    use HasFactory;

    protected $fillable = [
        'object_insurance',
        'insured_journey',
        'type_merchandise',
        'type_packing',
        'type_unify',
        'transportation',
        'annual_mobilization',
        'limit_shipment',
        'departure_date',
        'arrival_date',
        'precedent_conditions',
        'coverage',
        'ismerchandise',
        'port_entrance',
        'status_transport',
        'valuation_and_loss',
        'condition',
        'beneficiary',
        'utility_commission',
        'entrance',
        'custodia',
    ];

    public function slip()
    {
        return $this->morphMany(Slip::class, 'model');
    }

    public function storage_stock()
    {
        return $this->hasMany(StorageSlipStock::class, 'stock_id');
    }

    public function transport_stock()
    {
        return $this->hasMany(TransportSlipStock::class, 'stock_id');
    }
    public function slipType()
    {
        return $this->morphOne(SlipType::class, 'slippable');
    }
}
