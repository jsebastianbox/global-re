<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorderouxesInstallationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borderouxes_installations', function (Blueprint $table) {
            $table->id();
            $table->double('gross_premium')->nullable(); //prima bruta
            $table->double('taxes')->nullable(); //impuesto
            $table->double('net_premium')->nullable(); //prima neta
            $table->string('num_installation')->nullable(); //numero de instalamiento
            $table->integer('num_days')->nullable(); //numero de dias
            $table->string('date_installation')->nullable(); //fecha de instalacion
            $table->double('commission')->nullable(); //comision
            $table->double('commission_total')->nullable(); //comision total
            $table->boolean('is_generate_invoice')->nullable(); //estado de la factura
            $table->foreignId('borderouxes_id')
                ->constrained('borderouxes')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            //Info para facturacion
            $table->string('invoice_number')->nullable(); //Numero de factura
            $table->integer('invoice_serie')->nullable();
            $table->string('registry_number')->nullable(); //Numero de registro
            $table->string('status'); //Estado
            // $table->double('applied_value')->nullable()->default(00.00); //Valor aplicado

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
        Schema::dropIfExists('borderouxes_installations');
    }
}
