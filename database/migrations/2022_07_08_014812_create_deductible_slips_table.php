<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeductibleSlipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deductible_slips', function (Blueprint $table) {
            $table->id();
            $table->string('description_deductible')->nullable();
            $table->string('sinister_value')->nullable();
            $table->string('insured_value')->nullable();
            $table->string('minimum')->nullable();
            $table->string('description2_deductible')->nullable();
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
        Schema::dropIfExists('deductible_slips');
    }
}
