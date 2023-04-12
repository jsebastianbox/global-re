<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAppliedValueToBorderouxesInstallationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('borderouxes_installations', function (Blueprint $table) {
            $table->double('invoice_value')->nullable()->default(0)->after('commission_total'); //valor factura
            $table->double('applied_value')->nullable()->default(0)->after('commission_total'); //valor aplicado
            $table->double('invoice_balance')->nullable()->after('commission_total'); // saldo factura
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('borderouxes_installations', function (Blueprint $table) {
            //
        });
    }
}
