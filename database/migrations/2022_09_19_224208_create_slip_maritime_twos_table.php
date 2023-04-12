<?php

use App\Models\Slip;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlipMaritimeTwosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    //protection and indemnity p&i
    public function up()
    {
        Schema::create('slip_maritime_twos', function (Blueprint $table) {
            $table->id();
            $table->text('object_insurance')->nullable();
            //detalle de embarcacion
            $table->string('insured_sum')->nullable()->default(0);
            $table->string('limit_compensation')->nullable()->default(0);
            $table->string('aplications')->nullable();
            $table->string('navigation')->nullable();
            $table->text('coverage')->nullable();
            $table->text('precedent_conditions')->nullable();
            $table->string('modality')->nullable();
            $table->string('construction_material')->nullable(); // material de construccion
            $table->double('agreed_value')->nullable(); //
            //merchant
            $table->string('name_armador')->nullable();
            $table->smallInteger('experience_armador')->nullable()->default(0);
            $table->text('detail_boat')->nullable();
            $table->string('use_boat')->nullable();
            $table->string('detalleViajeText')->nullable();
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
        Schema::dropIfExists('slip_maritime_twos');
    }
}
