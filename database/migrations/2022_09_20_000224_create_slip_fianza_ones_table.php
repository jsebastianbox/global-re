<?php

use App\Models\Slip;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlipFianzaOnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //fianza
    //fidelidad

    public function up()
    {
        Schema::create('slip_fianza_ones', function (Blueprint $table) {
            $table->id();
            $table->string('type_coverage_fidelidad')->nullable();
            $table->string('discovery_period')->nullable();
            $table->double('limit_colusorio_value')->nullable();
            $table->string('limit_colusorio_text')->nullable();
            $table->text('coverage')->nullable();
            $table->text('condition_additional')->nullable();
            $table->string('siniestralidad')->nullable();
            $table->text('limit_aggregate')->nullable();
            $table->string('person_insured')->nullable();
            $table->string('sum_insured')->nullable();
            $table->string('quotationReport')->nullable(); //file
            $table->string('financialReport')->nullable(); //file
            $table->foreignIdFor(Slip::class);
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
        Schema::dropIfExists('slip_fianza_ones');
    }
}
