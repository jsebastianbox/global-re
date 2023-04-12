<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuaranteePaymentClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guarantee_payment_clients', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('num_day')->nullable();
            $table->string('installation')->nullable();
            $table->string('date_payment')->nullable();
            $table->string('description')->nullable();
            $table->double('valor')->nullable();
            $table->string('reinsurer_name')->nullable();
            $table->foreignId('slip_id')->constrained('slips')
                ->onDelete("cascade")
                ->onUpdate("cascade");
            /* $table->foreignId('reinsurer_id')->constrained('reinsurers')
                ->onDelete("cascade")
                ->onUpdate("cascade"); */
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
        Schema::dropIfExists('guarantee_payment_clients');
    }
}
