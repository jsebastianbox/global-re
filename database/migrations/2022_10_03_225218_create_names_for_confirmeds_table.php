<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNamesForConfirmedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    //nombres por confirmar
    public function up()
    {
        Schema::create('names_for_confirmeds', function (Blueprint $table) {
            $table->id();
            $table->string('cobertura')->nullable();
            $table->double('limiteAsegurado', 8, 2)->nullable();
            $table->double('tasaAjuste', 8, 2)->nullable();
            $table->double('primaBrutaUno', 8, 2)->nullable();
            $table->double('primaPartUno', 8, 2)->nullable();
            $table->double('dstos', 8, 2)->nullable();
            $table->double('prima', 8, 2)->nullable();
            $table->double('tasa', 8, 2)->nullable();
            $table->double('primaBrutaDos', 8, 2)->nullable();
            $table->double('primaPartDos', 8, 2)->nullable();
            $table->double('comision', 8, 2)->nullable();
            $table->double('comisionBq', 8, 2)->nullable();
            $table->double('impRenta', 8, 2)->nullable();
            $table->double('subTotal', 8, 2)->nullable();
            $table->double('isd', 8, 2)->nullable();
            $table->double('primaNeta', 8, 2)->nullable();
            $table->double('feePartener', 8, 2)->nullable();
            $table->double('feeGlobal', 8, 2)->nullable();
            $table->foreignId('slip_id')->constrained('slips')
                ->onDelete("cascade")
                ->onUpdate("cascade");
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
        Schema::dropIfExists('names_for_confirmeds');
    }
}
