<?php

use App\Models\Slip;
use App\Models\SlipAviationOne;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationAerialHelmetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //informacion de casco aereo
    public function up()
    {
        Schema::create('information_aerial_helmets', function (Blueprint $table) {
            $table->id();
            /* $table->unsignedBigInteger('model_id');
            $table->string('model_type'); */
            $table->string('type_ala_aerial')->nullable();
            $table->string('serie_aerial')->nullable();
            $table->string('marca_aerial')->nullable();
            $table->string('model_aerial')->nullable();
            $table->string('year_manufacture_aerial')->nullable();
            $table->string('cap_crew')->nullable();
            $table->string('cap_pax')->nullable();
            $table->string('sum_insured')->nullable();
            // $table->foreignId('slip_aviation_ones_id')->constrained('slip_aviation_ones')
            //     ->onDelete("cascade")
            //     ->onUpdate("cascade");
            $table->foreignIdFor(SlipAviationOne::class);
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
        Schema::dropIfExists('information_aerial_helmets');
    }
}
