<?php

use App\Models\Slip;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlipMaritimeOnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    //casco y maquina
    //responsabilidad civil

    public function up()
    {
        Schema::create('slip_maritime_ones', function (Blueprint $table) {
            $table->id();
            $table->text('object_insurance')->nulleable();
            $table->string('use')->nullable();
            $table->string('construction_material')->nullable(); // material de construccion
            $table->text('coverage')->nullable();
            $table->string('insured_sum')->nullable()->default(0);
            $table->text('detail_boat')->nullable(); //detalle valorado de las embarcaciones
            $table->text('precedent_conditions')->nullable(); //detalle valorado de las embarcaciones
            $table->string('name_armador')->nullable();
            $table->double('agreed_value')->nullable();

            $table->string('use_boat')->nullable();
            $table->smallInteger('experience_armador')->nullable()->default(0);
            $table->string('navigation')->nullable(); //area de navegacion
            $table->timestamps();
            $table->foreignIdFor(Slip::class);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slip_maritime_ones');
    }
}
