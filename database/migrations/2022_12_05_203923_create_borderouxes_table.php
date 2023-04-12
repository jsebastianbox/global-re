<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorderouxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borderouxes', function (Blueprint $table) {
            $table->id();
            $table->integer('bord_number')->nullable()->default(0);
            $table->string('cia_sure')->nullable();
            $table->string('insured')->nullable();
            $table->string('type_contract')->nullable();
            $table->string('coverage')->nullable();
            $table->string('sector')->nullable();
            $table->string('regime')->nullable();
            $table->string('subscription_year')->nullable();
            $table->string('movements')->nullable();
            $table->string('reinsurance_broker')->nullable();
            //$table->string('executive')->nullable(); //Ejecutivo que Colocó
            $table->string('from')->nullable(); //desde
            $table->string('until')->nullable(); //hasta
            $table->string('cover_note')->nullable(); //nota de cobertura
            $table->double('stake')->nullable(); //participacion
            $table->string('gross_premium')->nullable(); //prima bruta
            $table->double('tax_deductions')->nullable(); //Impuestos / Deducciones
            $table->string('reinsurance_premium')->nullable(); //Prima Neta Reaseguros
            $table->string('installation')->nullable();
            $table->string('payment_date')->nullable();
            $table->string('payment_guarantee_extension')->nullable();
            $table->double('installation_premium')->nullable(); //prima por instalamientos
            $table->string('gc_status_payment')->nullable();
            $table->string('ri_payment')->nullable();
            $table->string('ri_premium_payments')->nullable();
            $table->string('ri_status_payment')->nullable();
            $table->string('ri_date_payment')->nullable();
            $table->string('number_invoce')->nullable(); //factura
            $table->double('commission_percentage')->nullable(); //comision porcentaje
            $table->double('commission_total')->nullable(); //comision total
            $table->double('pay_form')->nullable(); //forma de pago
            $table->double('commission_received')->nullable(); //comision recibida
            $table->double('commission_receivable')->nullable(); //comision por cobrar
            $table->string('grb_status_payment')->nullable();
            $table->string('gr_date_entry')->nullable();
            $table->foreignId('assignor_id')->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            //info para la tabla de instalamentos
            $table->double('impuesto_por_instalamento')->nullable();
            $table->double('prima_neta_por_instalamento')->nullable();
            //

            $table->double('sum_insured')->nullable(); //suma asegurada
            $table->double('sum_insurable')->nullable(); //suma asegurable
            $table->double('limit_compensation')->nullable(); //limite indem

            //Info para facturacion

            $table->string('bank')->nullable(); //Banco
            $table->double('received_value')->nullable()->default(00.00); //Valor recibido
            $table->date('bank_deposit_date')->nullable(); //Fecha de depósito Banco

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borderouxes');
    }
}
