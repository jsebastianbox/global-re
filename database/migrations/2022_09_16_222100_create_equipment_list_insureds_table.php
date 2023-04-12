<?php

use App\Models\Slip;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentListInsuredsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment_list_insureds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('model_id');
            $table->string('model_type');
            $table->string('name_equipment')->nullable();
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
        Schema::dropIfExists('equipment_list_insureds');
    }
}
