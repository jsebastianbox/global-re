<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteDirectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente_directos', function (Blueprint $table) {
            $table->id();
            $table->string('ri_bq', 150)->nullable();
            $table->string('reference', 255)->nullable();
            $table->string('country', 255)->nullable();
            $table->string('contact', 255)->nullable();
            $table->string('region', 255)->nullable();
            $table->string('position', 255)->nullable();
            $table->string('business_line', 255)->nullable();
            $table->longText('excluye')->nullable();
            $table->string('email', 50)->nullable();
            $table->string('phone_one', 255)->nullable();
            $table->string('phone_two', 255)->nullable();
            $table->string('phone_three', 255)->nullable();
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
        Schema::dropIfExists('cliente_directos');
    }
}
