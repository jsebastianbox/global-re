<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBussinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bussines', function (Blueprint $table) {
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
        Schema::dropIfExists('bussines');
    }
}
