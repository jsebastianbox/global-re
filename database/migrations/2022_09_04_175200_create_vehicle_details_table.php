<?php

use App\Models\Slip;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('model_id');
            $table->string('model_type');
            $table->string('number_vehicle')->nullable();
            $table->string('plate_vehicle')->nullable();
            $table->string('type_vehicle')->nullable();
            $table->string('mark_vehicle')->nullable();
            $table->string('model_vehicle')->nullable();
            $table->integer('year_vehicle')->nullable();
            $table->string('chasis_vehicle')->nullable();
            $table->integer('passenger_vehicle')->nullable();
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
        Schema::dropIfExists('vehicle_details');
    }
}
