<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCobrokerajesTable extends Migration
{


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cobrokerajes', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('country_id')->nullable();
            $table->string('broker_local')->nullable();
            $table->string('assignor')->nullable(); //cedente
            $table->string('sector')->nullable();
            $table->string('receding')->nullable(); //retrocedente
            $table->string('insurance_intermediary')->nullable(); //intermediario de seguro
            $table->string('insured')->nullable(); //asegurado
            $table->string('direction')->nullable();
            $table->string('activity')->nullable(); //actividad
            $table->string('coin')->nullable();
            $table->string('equivalence')->nullable(); //tipo de cambio
            $table->string('validity_since')->nullable();
            $table->string('validity_until')->nullable();
            $table->string('insurance_object')->nullable(); //objeto del seguro
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
        Schema::dropIfExists('cobrokerajes');
    }
}
