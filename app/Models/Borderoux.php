<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borderoux extends Model
{
    use HasFactory;

    protected $fillable = [
        'bord_number', //numero borderoux
        'cia_sure', //cia seguros
        'insured', //aseguarado
        'type_contract', //tipo de contrato
        'coverage', //cobertura
        'sector', //sectorn
        'regime', //regimen
        'subscription_year', //año suscripcion
        'movements', //movimiento
        'reinsurance_broker', //broker reaseguro
        'assignor_id', //Ejecutivo que Colocó
        'from', //desde
        'until', //hasta
        'cover_note', //nota de cobertura
        'stake', //participacion
        'gross_premium', //prima bruta
        'tax_deductions', //Impuestos / Deducciones
        'reinsurance_premium', //Prima Neta Reaseguros
        'installation', //instalamentos
        'payment_date', //fecha pago instalamiento
        'payment_guarantee_extension',
        'installation_premium', //prima por instalamientos
        'gc_status_payment', //gc status pago
        'ri_payment', //ri por pagar
        'ri_premium_payments', //ri primas pagadas
        'ri_status_payment', //ri status pago
        'ri_date_payment', //ri fecha de pago ri
        'number_invoce', //factura
        'commission_percentage', //comision %
        'commission_total', //comision total
        'pay_form', //forma de pago
        'commission_received', //comision recibida
        'commission_receivable', //comision por cobrar
        'grb_status_payment', //grb status cobro
        'gr_date_entry', //gr fecha ingreso

        'sum_insured',  //asegurada
        'sum_insurable', //asegurable
        'limit_compensation', //limit

        //info para la tabla de instalamentos
        'impuesto_por_instalamento',
        'prima_neta_por_instalamento',

        //Info para facturacion
        'bank', //Entidad bancaria / Banco
        'received_value', //Valor recibido
        'bank_deposit_date', //Fecha del depósito del banco
    ];

    public function assignor()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function borderouxInstallation()
    {
        return $this->hasMany(BorderouxesInstallation::class,'borderouxes_id');
    }
}
