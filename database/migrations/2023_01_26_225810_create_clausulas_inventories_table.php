<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClausulasInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clausulas_inventories', function (Blueprint $table) {
            $table->id();
            $table->string('nomenclatura');
            $table->string('title');
            $table->string('languages');
            $table->string('coverages')->nullable();
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
        Schema::dropIfExists('clausulas_inventories');
    }
}
