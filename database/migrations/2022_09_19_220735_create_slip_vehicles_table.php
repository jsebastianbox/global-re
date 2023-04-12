<?php

use App\Models\Slip;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlipVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

     //slip vehiculos
    public function up()
    {
        Schema::create('slip_vehicles', function (Blueprint $table) {
            $table->id();
            $table->text('object_insurance')->nullable();
            $table->text('use_vehicle')->nullable();
            $table->text('coverage')->nullable();
            $table->string('sum_insured')->nullable()->default(0);
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
        Schema::dropIfExists('slip_vehicles');
    }
}
