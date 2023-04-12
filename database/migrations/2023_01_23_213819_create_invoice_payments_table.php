<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('model_id');
            $table->string('model_type');

            //detalle
            $table->string('insured')->nullable();
            $table->string('reinsurance_broker')->nullable();
            $table->string('bank')->nullable();
            $table->double('received_value')->nullable();
            $table->string('bank_deposit_date')->nullable();

            //lista
            $table->string('invoice_number')->nullable();
            $table->string('invoice_serie')->nullable()->default("N/A");
            $table->double('commission_total')->nullable()->default(0); //comision total
            $table->double('invoice_value')->nullable()->default(0);
            $table->string('status')->nullable();
            $table->double('applied_value')->nullable()->default(0); //valor aplicado
            $table->double('invoice_balance')->nullable(); // saldo factura
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
        Schema::dropIfExists('invoice_payments');
    }
}
