<?php

use App\Models\Slip;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlipTechnicalBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    //Ramos tecnicos
    //equipo electronico x
    //rotura de maquinaria x
    //perdida de beneficios por rotura de maquinaria x
    //equipo y maquinaria de contratistasW
    //todo riesgo para contratistas x
    //montaje de maquinaria x
    //alop x

    public function up()
    {
        Schema::create('slip_technical_branches', function (Blueprint $table) {
            $table->id();
            //montaje
            $table->text('object_insurance')->nullable();
            $table->string('maintenance_period')->nullable();
            //equipo electronico
            $table->string('sum_insured')->nullable()->default(0); //suma asegurable
            //perdida de beneficios por rotura de maquinaria
            $table->string('sum_assured')->nullable()->default(0); //suma asegurada
            $table->string('limit_compensation')->nullable()->default(0); //limite de compensacion
            //equipo y maquinaria de contratistas
            //aloap
            $table->string('type_form')->nullable();
            $table->string('coverage')->nullable()->default('0');
            $table->integer('period_compensation')->nullable()->default(0);
            //equipo electronico
            $table->text('object_insurance_detail')->nullable();
            //tabla
            //$table->string('insured_sum')->nullable(); //suma asegurable
            //$table->string('assured_sum')->nullable(); //suma asegurada
            $table->string('limit_comepensation')->nullable(); //limite de indmendizacion
            $table->foreignIdFor(Slip::class);

            //equipo electronico
            $table->string('asegurable_electronico')->nullable();
            $table->string('asegurada_electronico')->nullable();
            $table->string('todo_riesgo')->nullable();
            $table->string('portadores_externos')->nullable();
            $table->string('incremento_costos')->nullable();
            $table->string('limite_diario')->nullable();
            $table->string('periodo_cobertura')->nullable();
            $table->string('total_cuadro1')->nullable();
            $table->string('todo_riesgo2')->nullable();
            $table->string('portadores_externos2')->nullable();
            $table->string('incremento_costos2')->nullable();
            $table->string('total_cuadro2')->nullable();
            $table->string('nacionality')->nullable();
            $table->string('no_month')->nullable();

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
        Schema::dropIfExists('slip_technical_branches');
    }
}
