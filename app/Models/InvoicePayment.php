<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoicePayment extends Model
{
    use HasFactory;

    protected $fillable = [

        'insured', //asegurado
        'reinsurance_broker', //broker de resaguro
        'bank', //banco
        'received_value', //valor recibido
        'bank_deposit_date', //fecha de deposito

        'model_id',
        'model_type',
        'invoice_number', //numero de factura
        'invoice_serie', //numero de registro
        'commission_total', //comision total
        'invoice_value', //valor factura
        'status', //estado
        'applied_value', //valor aplicado
        'invoice_balance' // saldo factura
    ];

    public function model()
    {
        return $this->morphTo();
    }
}
