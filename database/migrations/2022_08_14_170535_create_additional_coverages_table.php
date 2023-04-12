<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdditionalCoveragesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('additional_coverages', function (Blueprint $table) {
            $table->id();
            $table->string('description_coverage_additional')->nullable();
            $table->string('coverage_additional_usd')->nullable();
            $table->string('coverage_additional_additional')->nullable();
            $table->string('coverage_additional_additional2')->nullable();
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
        Schema::dropIfExists('additional_coverages');
    }
}
