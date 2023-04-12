<?php

use App\Models\Slip;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlipAviationTwosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    //perdida de licencia
    public function up()
    {
        Schema::create('slip_aviation_twos', function (Blueprint $table) {
            $table->id();
            $table->text('coverage')->nullable();
            $table->string('use_loss_license')->nullable();
            $table->text('geography_limit')->nullable();
            //merchant
            $table->string('compensation_limit')->nullable();
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
        Schema::dropIfExists('slip_aviation_twos');
    }
}
