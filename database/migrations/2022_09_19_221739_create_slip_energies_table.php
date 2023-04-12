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
            $table->string('sum_insured')->nullable()->default(0);
            $table->string('limit_compensation')->nullable()->default(0);
            $table->text('coverage')->nullable();
            //merchant
            $table->string('ingress_year')->nullable()->default(0);
            $table->string('value_payroll')->nullable();
            $table->smallInteger('num_employee')->nullable()->default(0);
            $table->smallInteger('num_vehicle')->nullable()->default(0);
            $table->integer('barrel_production_day')->nullable()->default(0);
            $table->string('cost_barrel')->nullable()->default(0);
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
