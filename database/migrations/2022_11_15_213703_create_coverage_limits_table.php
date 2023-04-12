<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoverageLimitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coverage_limits', function (Blueprint $table) {
            $table->id();
            $table->string('limit_description_coverage')->nullable();
            $table->string('limit_aditional_coverage')->nullable();
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
        Schema::dropIfExists('coverage_limits');
    }
}
