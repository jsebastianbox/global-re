<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBailTextToSlipFianzaTwosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('slip_fianza_twos', function (Blueprint $table) {
            $table->string('bailText')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('slip_fianza_twos', function (Blueprint $table) {
            $table->dropColumn('bailText');
        });
    }
}
