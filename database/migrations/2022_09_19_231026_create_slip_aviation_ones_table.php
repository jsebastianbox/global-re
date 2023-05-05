<?php

use App\Models\Slip;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlipAviationOnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    //casco  aereo
    //responsabilidad civil 

    public function up()
    {
        Schema::create('slip_aviation_ones', function (Blueprint $table) {
            $table->id();
            $table->text('object_insurance')->nullable();
            $table->text('precedent_conditions')->nullable();
            //$table->string('aircraft_information')->nullable();
            $table->string('use_aerial')->nullable();
            $table->string('geography_limit')->nullable();
            //merchant
            $table->string('type_aviation')->nullable();
            $table->text('coverage')->nullable();
            $table->string('coverage_limit')->nullable();
            $table->string('valor_asegurado')->nullable();
            $table->double('limit_compensation')->nullable();
            $table->string('pilot_authorized')->nullable();
            $table->string('time_model_mark')->nullable();
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
        Schema::dropIfExists('slip_aviation_ones');
    }
}
