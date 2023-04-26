<?php

use App\Models\Slip;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSumAssuredsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sum_assureds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('model_id');
            $table->string('model_type');
            $table->string('equipment_name')->nullable();
            $table->text('location')->nullable(); //ubicacion
            $table->string('edification')->nullable(); //edificios
            $table->string('contents')->nullable(); //contenido
            $table->string('equipment')->nullable(); //equipo y maquina
            $table->string('machine')->nullable(); //muebles y enseres
            //$table->string('furnishing_enseres')->nullable();
            $table->string('commodity')->nullable(); //mercaderia
            $table->string('other_sum_assured')->nullable(); //otros
            $table->string('other_sum_assured_1')->nullable(); //otros
            $table->string('other_sum_assured_2')->nullable(); //otros
            $table->string('other_sum_assured_3')->nullable(); //otros
            $table->string('other_sum_assured_4')->nullable(); //otros
            $table->string('other_sum_assured_5')->nullable(); //otros
            $table->foreignIdFor(Slip::class);
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
        Schema::dropIfExists('sum_assureds');
    }
}
