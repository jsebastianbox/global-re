<?php

use App\Models\Slip;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlipFianzaTwosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    //fianza
    //seriedad de oferta
    //cumplimiento de contrato
    //buen uso de anticipo
    //ejecucion de obra y buena calidad de materiales
    //garantias aduaneras
    //otras garantias

    public function up()
    {
        Schema::create('slip_fianza_twos', function (Blueprint $table) {
            $table->id();
            //unsecured obligation
            $table->text('unsecured_obligation')->nullable();
            $table->string('entrenched')->nullable(); //afianzado
            $table->string('person_insured')->nullable(); //afianzado
            $table->string('beneficiary')->nullable();
            $table->string('beneficiary_activity')->nullable();
            $table->string('beneficiary_direcction')->nullable();
            $table->string('mount_fianza')->nullable();
            $table->string('mount_contract')->nullable();
            $table->string('validity_contract')->nullable();
            $table->string('counter_guarantee_detail')->nullable(); //detalle de contragarantia
            $table->text('coverage')->nullable();

            $table->string('type_fianza')->nullable();
            $table->string('from_date_mount_fianza')->nullable();
            $table->string('to_date_mount_fianza')->nullable();
            $table->string('from_date_mount_contract')->nullable();
            $table->string('to_date_mount_contract')->nullable();
            $table->string('contract_percentage')->nullable();

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
        Schema::dropIfExists('slip_fianza_twos');
    }
}
