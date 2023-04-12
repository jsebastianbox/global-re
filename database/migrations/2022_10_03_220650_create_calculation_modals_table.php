<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalculationModalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

     //calculos
    public function up()
    {
        Schema::create('calculation_modals', function (Blueprint $table) {
            $table->id();
            $table->double('isd', 8,2)->nullable();
            $table->double('impRenta', 8,2)->nullable();
            $table->double('ciaSeguros', 8,2)->nullable();
            $table->double('comGloba', 8,2)->nullable();
            $table->double('ciaPartner', 8,2)->nullable();
            $table->double('comBq', 8,2)->nullable();
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
        Schema::dropIfExists('calculation_modals');
    }
}
