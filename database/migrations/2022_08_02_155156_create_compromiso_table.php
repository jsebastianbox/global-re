<?php

use App\Models\Slip;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompromisoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

     //eliminar tabla
    public function up()
    {
        Schema::create('compromiso', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('insured')->nullable();
            $table->string('branch')->nullable();
            $table->string('step')->nulable();
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
        Schema::dropIfExists('compromiso');
    }
}
