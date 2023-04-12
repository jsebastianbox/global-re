<?php

use App\Models\Slip;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquiposElectronicosTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos_electronicos_tables', function (Blueprint $table) {
            $table->id();
            $table->double('todo_riesgo')->nullable();
            $table->double('portadores_externos')->nullable();
            $table->double('incremento_costos')->nullable();
            $table->double('limite_diario')->nullable();
            $table->double('periodo_cobertura')->nullable();
            $table->double('total_cuadro1')->nullable();
            $table->double('todo_riesgo2')->nullable();
            $table->double('portadores_externos2')->nullable();
            $table->double('incremento_costos2')->nullable();
            $table->double('total_cuadro2')->nullable();
            $table->double('limite_indemnizacion')->nullable();
            $table->double('asegurable_electronico')->nullable();
            $table->double('asegurada_electronico')->nullable();
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
        Schema::dropIfExists('equipos_electronicos_tables');
    }
}
