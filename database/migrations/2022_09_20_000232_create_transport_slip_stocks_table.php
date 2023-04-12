<?php

use App\Models\Slip;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportSlipStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transport_slip_stocks', function (Blueprint $table) {
            $table->id();
            $table->string('value_transport_stock');
            $table->string('description_transport_stock')->nullable();
            $table->foreignId('slip_maritime_fours_id')->constrained('slip_maritime_fours')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
            $table->foreignIdFor(Slip::class);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transport_slip_stocks');
    }
}
