<?php

use App\Models\Slip;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAviacionExtrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aviacion_extras', function (Blueprint $table) {
            $table->id();
            $table->string('description_coverage')->nullable();
            $table->double('aditional_coverage')->nullable();
            $table->string('limit_description_coverage')->nullable();
            $table->double('limit_aditional_coverage')->nullable();
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
        Schema::dropIfExists('aviacion_extras');
    }
}
