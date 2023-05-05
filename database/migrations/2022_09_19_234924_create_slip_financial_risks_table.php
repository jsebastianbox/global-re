<?php

use App\Models\Slip;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlipFinancialRisksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    //riesgos financieros

    //bancos e instituciones financieras (bbb)
    //fidelidad para instituciones financieras

    public function up()
    {
        Schema::create('slip_financial_risks', function (Blueprint $table) {
            $table->id();
            $table->string('object_insurance')->nullable();
            //sublimites
            //condiciones
            $table->double('limit_colusorio_value')->nullable();
            $table->string('limit_colusorio_text')->nullable();
            $table->string('condition_additional')->nullable();
            $table->string('siniestralidad')->nullable();
            $table->string('description_compensation_limit')->nullable();
            $table->string('description_compensation_limit2')->nullable();
            $table->string('description_compensation_limit3')->nullable();
            $table->string('limit_compensation')->nullable();
            $table->string('type_coverage_fidelidad')->nullable();
            $table->string('discovery_period')->nullable();
            $table->string('precedent_conditions')->nullable();
            $table->text('limit_aggregate')->nullable();
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
        Schema::dropIfExists('slip_financial_risks');
    }
}
