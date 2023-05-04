<?php

use App\Models\Slip;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompensationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compensation', function (Blueprint $table) {
            $table->id();
            $table->double('Indemnizacion1')->nullable();
            $table->double('Indemnizacion2')->nullable();
            $table->double('Indemnizacion3')->nullable();
            $table->double('Indemnizacion4')->nullable();
            $table->double('Indemnizacion5')->nullable();
            $table->double('Indemnizacion6')->nullable();
            $table->double('Indemnizacion7')->nullable();
            $table->double('Indemnizacion8')->nullable();
            $table->double('Indemnizacion9')->nullable();
            $table->double('Indemnizacion10')->nullable();
            $table->double('Indemnizacion11')->nullable();
            $table->double('Indemnizacion12')->nullable();
            $table->double('Indemnizacion13')->nullable();
            $table->double('Indemnizacion14')->nullable();
            $table->double('Indemnizacion15')->nullable();
            $table->double('Indemnizacion16')->nullable();
            $table->double('Indemnizacion17')->nullable();
            $table->double('Indemnizacion18')->nullable();
            $table->double('Indemnizacion19')->nullable();
            $table->double('Indemnizacion20')->nullable();
            $table->double('Indemnizacion21')->nullable();
            $table->double('Indemnizacion22')->nullable();
            $table->double('Indemnizacion23')->nullable();
            $table->double('Indemnizacion24')->nullable();
            $table->double('Indemnizacion25')->nullable();
            $table->double('Indemnizacion26')->nullable();
            $table->double('Indemnizacion27')->nullable();
            $table->double('Indemnizacion28')->nullable();
            $table->double('Indemnizacion29')->nullable();
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
        Schema::dropIfExists('compensation');
    }
}
