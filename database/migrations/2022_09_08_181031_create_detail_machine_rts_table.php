<?php

use App\Models\Slip;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailMachineRtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_machine_rts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('model_id');
            $table->string('model_type');
            $table->string('type_machine')->nullable();
            $table->string('mark_machine')->nullable();
            $table->string('model_machine')->nullable();
            $table->integer('year_machine')->nullable();
            $table->string('serie_machine')->nullable();
            $table->string('sum_insured_machine')->nullable();
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
        Schema::dropIfExists('detail_machine_rts');
    }
}
