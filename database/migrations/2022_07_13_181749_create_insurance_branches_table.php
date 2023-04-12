<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsuranceBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurance_branches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('insurance_id')->constrained('insurances')
                ->onDelete("cascade")
                ->onUpdate("cascade");
            $table->foreignId('branch_id')->constrained('branches')
                ->onDelete("cascade")
                ->onUpdate("cascade");
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
        Schema::dropIfExists('insurance_branches');
    }
}
