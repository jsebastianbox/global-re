<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClauseSlipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clause_slips', function (Blueprint $table) {
            $table->id();
            $table->string('description_clause_additional')->nullable();
            $table->string('clause_additional_additional')->nullable();
            $table->string('clause_additional_additional2')->nullable();
            $table->string('clause_additional_usd')->nullable()->default(0);
            $table->string('other')->nullable();
            $table->foreignId('slip_id')->constrained('slips')
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
        Schema::dropIfExists('clause_slips');
    }
}
