<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsurancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //seguros
        Schema::create('insurances', function (Blueprint $table) {
            $table->id();
            $table->string('country')->nullable();
            $table->string('name')->nullable();
            $table->string('registered_name');
            $table->string('contact')->nullable();
            $table->string('position')->nullable();
            $table->string('coverage')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone_two')->nullable();
            $table->string('phone_three')->nullable();
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
        Schema::dropIfExists('insurances');
    }
}
