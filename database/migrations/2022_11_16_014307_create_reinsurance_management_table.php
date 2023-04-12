<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReinsuranceManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reinsurance_management', function (Blueprint $table) {
            $table->id();
            $table->string('number')->nulleable();
            $table->string('subscriber')->nulleable();
            //$table->string('cob')->nulleable();
            $table->double('percentage')->nulleable();
            $table->text('observation')->nulleable();
            $table->string('creation_date')->nulleable();
            $table->string('update_date')->nulleable();
            $table->foreignId('reinsurance_id')->constrained('reinsurers') //persona asignada
                ->onDelete("cascade")
                ->onUpdate("cascade")->nullable();
            $table->foreignId('slip_id')->constrained('slips') //persona asignada
                ->onDelete("cascade")
                ->onUpdate("cascade")->nullable();
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
        Schema::dropIfExists('reinsurance_management');
    }
}
