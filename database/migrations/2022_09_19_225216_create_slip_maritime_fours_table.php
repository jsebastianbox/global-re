<?php

use App\Models\Slip;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlipMaritimeFoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    //tranportacion
    //interno
    //exportaciones
    //importaciones
    //stock throughput stp
    //transporte de dinero

    public function up()
    {
        Schema::create('slip_maritime_fours', function (Blueprint $table) {
            $table->id();
            $table->text('object_insurance')->nullable();
            $table->string('insured_journey')->nullable();
            $table->string('type_merchandise')->nullable();
            $table->string('type_packing')->nullable();
            $table->string('type_unify')->nullable();
            $table->string('transportation')->nullable();
            $table->string('annual_mobilization')->nullable()->default(0);
            $table->string('limit_shipment')->nullable()->default(0);
            $table->string('departure_date')->nullable();
            $table->string('arrival_date')->nullable();
            $table->text('coverage')->nullable();
            $table->text('precedent_conditions')->nullable();
            //merchant
            $table->boolean('ismerchandise')->default(false)->nullable(); //¿Existe transbordo de marcadería?
            $table->string('port_entrance')->nullable();
            $table->string('status_transport')->nullable();
            //slip stock throughput stp
            $table->string('valuation_and_loss')->nullable();
            $table->string('condition')->nullable();
            $table->string('entrance')->nullable();
            $table->string('custodia')->nullable();
            $table->string('utility_commission')->nullable();
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
        Schema::dropIfExists('slip_maritime_fours');
    }
}
