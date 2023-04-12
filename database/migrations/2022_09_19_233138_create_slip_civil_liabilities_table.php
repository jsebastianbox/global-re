<?php

use App\Models\Slip;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlipCivilLiabilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    //responsabilidad civil

    //extracontractual plo
    //contractual x
    //errores y omisiones x
    //responsabilidad civil medica x
    //responsabilidad civil profesional x
    //directores y administradores x

    public function up()
    {
        Schema::create('slip_civil_liabilities', function (Blueprint $table) {
            $table->id();

            //error y emocion
            $table->text('object_insurance')->nullable();
            //$table->string('limit_compensation',8,2);
            $table->text('condition_additional')->nullable();
            $table->text('coverage')->nullable();
            $table->text('siniestralidad')->nullable();
            $table->text('deductions')->nullable();
            $table->double('ingress_previous_year')->nullable();
            $table->double('ingress_present_year')->nullable();
            $table->double('ingress_next_year')->nullable();
            $table->double('value_payroll')->nullable();
            $table->smallInteger('num_employee')->nullable()->default(0);
            $table->smallInteger('num_vehicle')->nullable()->default(0);
            //contractual
            $table->string('limit_compensation')->nullable();
            $table->double('limit_event')->nullable();
            $table->double('limit_annual')->nullable();
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
        Schema::dropIfExists('slip_civil_liabilities');
    }
}
