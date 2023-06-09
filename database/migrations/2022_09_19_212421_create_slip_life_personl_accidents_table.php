<?php

use App\Models\Slip;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlipLifePersonlAccidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //Vida y accidentes personales
    public function up()
    {
        Schema::create('slip_life_personl_accidents', function (Blueprint $table) {
            $table->id();
            $table->string('num_insurer')->nullable();
            $table->integer('accumulation')->nullable();
            //Límite Asegurado
            $table->string('max_age_approve')->nullable();
            $table->string('max_age_cancel')->nullable();
            $table->string('compensation_since')->nullable();
            $table->string('compensation_until')->nullable();
            $table->string('compensation_porcentage')->nullable();
            $table->string('beneficiary_disability')->nullable();
            $table->string('beneficiary_death')->nullable();
            $table->double('coverage_foundation')->nullable(); //base de la cobertura
            //merchant
            $table->string('people_insurer')->nullable();
            $table->double('sum_insurer')->nullable();
            $table->double('equivalence')->nullable();
            $table->string('siniestralidad')->nullable();
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
        Schema::dropIfExists('slip_life_personl_accidents');
    }
}
