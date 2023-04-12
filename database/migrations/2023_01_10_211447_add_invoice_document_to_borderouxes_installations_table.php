<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInvoiceDocumentToBorderouxesInstallationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('borderouxes_installations', function (Blueprint $table) {
        //     $table->string('invoice_number')->after('commission_total');
        //     $table->integer('invoice_serie')->nullable()->after('commission_total');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('borderouxes_installations', function (Blueprint $table) {
        //     //
        // });
    }
}
