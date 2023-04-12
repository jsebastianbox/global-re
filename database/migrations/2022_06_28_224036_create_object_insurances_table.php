<?php

use App\Models\Slip;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObjectInsurancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('object_insurances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('model_id');
            $table->string('model_type');
            $table->string('number')->nullable();
            $table->string('name')->nullable();
            $table->string('birthday')->nullable();
            $table->string('sex_merchant')->nullable();
            $table->string('activity_merchant')->nullable();
            $table->double('age')->nullable();
            $table->double('limit')->nullable();
            $table->foreignIdFor(Slip::class);
            // $table->foreignId('slip_id')->constrained('slip_lives')
            //     ->onDelete("cascade")
            //     ->onUpdate("cascade");
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
        Schema::dropIfExists('object_insurances');
    }
}
