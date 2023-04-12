<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExclusionSlipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exclusion_slips', function (Blueprint $table) {
            $table->id();
            $table->string('description_exclusion');
            $table->string('other')->nullable();
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
        Schema::dropIfExists('exclusion_slips');
    }
}
