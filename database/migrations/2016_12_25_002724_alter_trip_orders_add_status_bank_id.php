<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTripOrdersAddStatusBankId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trip_orders', function($table) {
            $table->tinyInteger('status')->default(0);
            $table->string('bank_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trip_orders', function($table) {
            $table->dropColumn('status');
            $table->dropColumn('bank_id');
        });
    }
}
