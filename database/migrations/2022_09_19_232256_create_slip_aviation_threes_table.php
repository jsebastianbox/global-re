<?php

use App\Models\Slip;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlipAviationThreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    //responsabilidad civil aeroportuaria
    //responsabilidad civil hangares
    //ariel 

    public function up()
    {
        Schema::create('slip_aviation_threes', function (Blueprint $table) {
            $table->id();
            $table->text('object_insurance')->nullable();
            $table->text('valor_asegurado')->nullable();
            $table->string('limit_compensation')->nullable();
            $table->string('geography_limit')->nullable();
            $table->string('type_aviation')->nullable();
            $table->text('use_aerial')->nullable();
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
        Schema::dropIfExists('slip_aviation_threes');
    }
}
