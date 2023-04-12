<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationReinsurancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information_reinsurances', function (Blueprint $table) {
            $table->id();
            $table->string('name_insurer')->nullable();
            $table->double('sumaAsegurada', 8,2)->nullable();
            $table->double('participacion', 8,2)->nullable();
            $table->double('tasaBruta', 8,2)->nullable();
            $table->double('dstos', 8,2)->nullable();
            $table->double('tasaNeta', 8,2)->nullable();
            $table->double('primaNeta', 8,2)->nullable();
            $table->double('primaPart', 8,2)->nullable();
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
        Schema::dropIfExists('information_reinsurances');
    }
}
