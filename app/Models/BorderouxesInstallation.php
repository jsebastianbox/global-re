<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorderouxesInstallation extends Model
{
    use HasFactory;

    protected $fillable = [
        'gross_premium', //prima bruta
        'taxes', //impuesto
        'net_premium', //prima neta
        'num_installation', //numero de instalamiento
        'num_days', //numero de dias
        'date_installation', //fecha de instalacion
        'commission', //comision
        'commission_total', //comision total
        'is_generate_invoice', //estado de la factura,
        'invoice_number', //numero de factura
        'invoice_serie', //numero de registro
        'invoice_value', //valor factura
        'applied_value', //valor aplicado
        'invoice_balance', //saldo factura
        'status', //status
        'borderouxes_id'
    ];

    public function borderoxes()
    {
        return $this->belongsTo(Borderoux::class, 'id');
    }

    public function invoicePayment()
    {
        return $this->morphMany(InvoicePayment::class, 'model');
    }
}
