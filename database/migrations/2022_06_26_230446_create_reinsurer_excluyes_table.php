<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReinsurerExcluyesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reinsurer_excluyes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('reinsurer_id')->nullable()->constrained('reinsurers')
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
        Schema::dropIfExists('reinsurer_excluyes');
    }
}
