<?php

use App\Models\Slip;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlipPropertyFixedAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    //propiedad de activos fijos
    public function up()
    {
        Schema::create('slip_property_fixed_assets', function (Blueprint $table) {
            $table->id();
            //lucro cesante por incendio y linea aleadas
            $table->text('object_insurance')->nullable();
            $table->string('limit_compensation')->nullable()->default(0);
            $table->text('coverage')->nullable();
            //$table->enum('type_loss_profits',['Inglesa','Americana']);
            $table->string('type_loss_profits')->nullable()->default('Inglesa');
            $table->string('period_compensation')->nullable();

            //incendio y lineas aliadas
            //$table->string('object_insurance')->nullable();
            $table->string('insurable_sum')->nullable();
            //$table->string('limit_compensation')->nullable();
            $table->string('coverage_foundation')->nullable();

            //robo
            //$table->string('coverage')->nullable();
            //$table->string('object_insurance')->nullable();
            //$table->string('limit_compensation')->nullable();
            //$table->enum('first_risk', ['Absoluto', 'Relativo']);
            $table->string('first_risk')->nullable()->default('Absoluto');
            $table->string('th_sum_assured_1')->nullable();
            $table->string('th_sum_assured_2')->nullable();
            $table->string('th_sum_assured_3')->nullable();
            $table->string('th_sum_assured_4')->nullable();
            $table->string('th_sum_assured_5')->nullable();

            //sabotaje y terrorismo
            //$table->string('coverage')->nullable();
            //$table->string('object_insurance')->nullable();
            //$table->string('insurable_sum')->nullable();
            //$table->string('limit_compensation')->nullable();
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
        Schema::dropIfExists('slip_property_fixed_assets');
    }
}
