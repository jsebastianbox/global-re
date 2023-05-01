<?php

use App\Models\Slip;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancialRiskConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financial_risk_conditions', function (Blueprint $table) {
            $table->id();
            $table->string('description_condition_additional')->nullable();
            $table->string('condition_additional_usd')->nullable();
            $table->string('condition_additional_additional')->nullable();
            $table->string('condition_additional_additional2')->nullable();
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
        Schema::dropIfExists('financial_risk_conditions');
    }
}
