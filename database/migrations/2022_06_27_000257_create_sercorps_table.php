<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSercorpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sercorps', function (Blueprint $table) {
            $table->id();
            $table->string('process_code')->nullable();
            $table->string('process_link')->nullable();
            $table->text('entity')->nullable();
            $table->text('object')->nullable();
            $table->double('budget')->default(0); //presopuesto referencial prima
            $table->string('date_publication');
            $table->string('status')->nullable();
            /* $table->foreignId('awardee_id')->nullable()->constrained('insurances') //adjudicado
                ->onDelete("cascade")
                ->onUpdate("cascade"); */
            $table->string('awardee_id')->nullable();
            $table->double('awardee_value')->default(0); //valor adjudicado
            $table->string('coment')->nullable();
            $table->string('alerta')->nullable();
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
        Schema::dropIfExists('sercorps');
    }
}
