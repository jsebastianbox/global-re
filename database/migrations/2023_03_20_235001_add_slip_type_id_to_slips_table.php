<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSlipTypeIdToSlipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('slips', function (Blueprint $table) {
            $table->unsignedBigInteger('slip_type_id')->nullable();
            $table->foreign('slip_type_id')->references('id')->on('slip_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('slips', function (Blueprint $table) {
            //
        });
    }
}
