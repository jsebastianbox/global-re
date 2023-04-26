<?php

use App\Models\Slip;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlipEnergiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    //slip energia

    //upstream
    //downstream
    //responsabilidad civil

    public function up()
    {
        Schema::create('slip_energies', function (Blueprint $table) {
            $table->id();
            $table->text('object_insurance')->nullable();
            $table->string('sum_insured')->nullable();
            $table->string('limit_compensation')->nullable();
            $table->text('coverage')->nullable();
            //merchant
            $table->string('ingress_year')->nullable();
            $table->string('value_payroll')->nullable();
            $table->smallInteger('num_employee')->nullable();
            $table->smallInteger('num_vehicle')->nullable();
            $table->integer('barrel_production_day')->nullable();
            $table->string('cost_barrel')->nullable();
            //table sum assured
            $table->string('th_sum_assured_1')->nullable();
            $table->string('th_sum_assured_2')->nullable();
            $table->string('th_sum_assured_3')->nullable();
            $table->string('th_sum_assured_4')->nullable();
            $table->string('th_sum_assured_5')->nullable();
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
        Schema::dropIfExists('slip_energies');
    }
}
