<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTransporterAddressAddSomePhones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transporter_address', function($table) {
            $table->string('name')->nullable();
            $table->string('phone_ticket')->nullable();
            $table->string('phone_shop')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transporter_address', function($table) {
            $table->dropColumn('name');
            $table->dropColumn('phone_ticket');
            $table->dropColumn('phone_shop');
        });
    }
}
