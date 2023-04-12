<?php

use App\Models\Clausulas_selector;
use App\Models\CoberturasSelector;
use App\Models\TypeCoverage;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slips', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('model_id');
            $table->string('model_type');
            $table->string('coin')->nullable(); //tipo de mondeada
            // $table->unsignedBigInteger('type_coverage'); //tipo de cobertura
            $table->foreignId('type_coverage')->constrained('type_coverages')
                ->onDelete("cascade")
                ->onUpdate("cascade");
            $table->foreignId('country_id')->constrained('countries')
                ->onDelete("cascade")
                ->onUpdate("cascade");
            $table->string('date')->nullable();
            $table->string('broker')->nullable();
            $table->string('assignor')->nullable(); //cedente
            $table->string('insurer')->nullable(); //asegurador
            //$table->enum('sector', ['Público', 'Privado'])->nullable();
            $table->string('sector')->nullable();
            $table->string('direction')->nullable();
            $table->string('activity')->nullable();
            $table->string('validity_since')->nullable(); //vigencia desde
            $table->string('validity_until')->nullable(); //vigencia hasta

            $table->string('person_insured')->nullable();
            $table->string('object_insured')->nullable();
            $table->string('object_insurance')->nullable();
            $table->string('coverage')->nullable();

            //nuevos by juanse
            $table->string('insuranceBroker')->nullable(); //intermediario de seguros
            $table->string('retrocedente')->nullable(); //retrocedente
            $table->string('accidentRate')->nullable(); //siniestralidad 5 años
            //
            $table->string('clarification')->nullable(); //aclaracion 1-m
            $table->string('reinsurer_rate')->nullable(); //tasa de resagurador
            $table->string('reinsurance_premium')->nullable(); //prima de resagurador
            $table->string('siniestralidad')->nullable();
            $table->string('deduction')->nullable(); //deducciones
            $table->string('note_sinester')->nullable(); //notificacion de siniestros
            $table->double('equivalence')->nullable(); //notificacion de siniestros
            $table->foreignId('politics_country_one')->nullable()->constrained('countries')
                ->onDelete("cascade")
                ->onUpdate("cascade");
            //se remueve politics_country_two pq es el mismo que el uno.
            $table->string('placement_scheme')->nullable(); //esquema de colocalacion
            $table->string('reinsurance_withholding')->nullable(); //retencion de resaguros
            $table->string('reinsurance_assignment')->nullable(); //cesion de resaguros
            $table->string('reinsurance_condition')->nullable(); //condicion de resaguros
            $table->string('subject')->nullable(); //sujeto
            $table->string('information')->nullable();
            $table->string('coverage_slip')->nullable(); //cobertura
            $table->string('limit_compensation')->nullable(); //cobertura
            $table->double('retention_porcentage_one')->nullable(); //retencion de resaguros porcentage
            $table->double('retention_porcentage_two')->nullable(); //retencion de resaguros porcentage
            $table->double('cesion_porcentage_one')->nullable(); //cesion de resaguros porcentage
            $table->double('cesion_porcentage_two')->nullable(); //cesion de resaguros porcentage
            $table->foreignId('user_id')->constrained('users') //persona asignada
                ->onDelete("cascade")
                ->onUpdate("cascade")->nullable();
            $table->unsignedBigInteger('slip_status_id')->nullable(); //Estado del slip
            $table->foreign('slip_status_id')->references('id')->on('slip_statuses')
                ->onDelete("cascade")
                ->onUpdate("cascade")->nullable()->default("2");
            // $table->unsignedBigInteger('coberturas_selectors');
            // $table->unsignedBigInteger('clausulas_selectors');
            $table->foreignIdFor(Clausulas_selector::class);
            $table->foreignIdFor(CoberturasSelector::class);
            $table->string('main_risk')->nullable();
            $table->double('insurable_sum')->nullable();
            $table->double('insured_value')->nullable();
            $table->double('person_insured_value')->nullable();
            $table->double('object_insured_value')->nullable();
            $table->double('insurable_value')->nullable();
            $table->double('insured_sum')->nullable();
            // $table->foreignIdFor(TypeCoverage::class);
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
        Schema::dropIfExists('slips');
    }
}
