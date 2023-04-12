<?php

use App\Models\Slip;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStorageSlipStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

     //cambiar slip_stocks por slip_maritime_fours
    public function up()
    {
        Schema::create('storage_slip_stocks', function (Blueprint $table) {
            $table->id();
            $table->string('value_storage_stock');
            $table->string('description_storage_stock')->nullable();
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
        Schema::dropIfExists('storage_slip_stocks');
    }
}
