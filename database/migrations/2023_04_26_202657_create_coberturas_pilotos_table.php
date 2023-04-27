<?php

use App\Models\Slip;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoberturasPilotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coberturas_pilotos', function (Blueprint $table) {
            $table->id();
            $table->string('description_coverage_additional')->nullable();
            $table->string('coverage_additional_usd')->nullable();
            $table->string('coverage_additional_additional')->nullable();
            $table->string('coverage_additional_additional2')->nullable();
            $table->string('sum_assured')->nullable();
            $table->string('pilots_quantity')->nullable();
            $table->string('total_assured')->nullable();
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
        Schema::dropIfExists('coberturas_pilotos');
    }
}
