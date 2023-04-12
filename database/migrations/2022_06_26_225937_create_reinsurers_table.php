<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReinsurersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reinsurers', function (Blueprint $table) {

            //cambios
            $table->id();
            $table->string('name')->nullable();
            $table->string('reference')->nullable();
            $table->string('country_id')->nullable();
            $table->string('contact_id')->nullable();
            $table->string('region_id')->nullable();
            $table->string('position_id')->nullable();
            $table->string('business')->nullable();
            $table->string('excluye')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_one')->nullable();
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
        Schema::dropIfExists('reinsurers');
    }
}
