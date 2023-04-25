<?php

use App\Models\Slip;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoatDetailSlipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boat_detail_slips', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('model_id');
            $table->string('model_type');
            $table->string('name_boat')->nullable();
            $table->string('registration_boat')->nullable();
            $table->string('material_boat')->nullable();
            $table->string('manga_boat')->nullable();
            $table->string('eslora_boat')->nullable();
            $table->string('puntual_boat')->nullable();
            $table->string('shell_boat')->nullable();
            $table->string('machine_boat')->nullable();
            $table->string('deducible_boat')->nullable();
            /* $table->foreignId('slip_id')->constrained('slips')
                ->onDelete("cascade")
                ->onUpdate("cascade"); */
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
        Schema::dropIfExists('boat_detail_slips');
    }
}
