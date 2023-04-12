<?php

use App\Models\Slip;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlipMaritimeThreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    //rc portuaria
    //rc astilleros
    //rc armadores
    public function up()
    {
        Schema::create('slip_maritime_threes', function (Blueprint $table) {
            $table->id();
            $table->string('coverage')->nullable();
            $table->string('object_insurance')->nullable();
            $table->string('limit_compensation')->nullable();
            $table->string('precedent_conditions')->nullable();
            //merchant
            $table->string('person_insured')->nullable();
            //$table->string('sum_insured')->nullable();
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
        Schema::dropIfExists('slip_maritime_threes');
    }
}
