<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripOrderDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trip_order_details', function($table) {
            $table->bigIncrements('id');
            $table->bigInteger('order_id')->default(0);
            $table->bigInteger('trip_id')->default(0);
            $table->integer('ticket')->default(0);
            $table->integer('price')->default(0);
            $table->integer('total_money')->default(0);
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
        Schema::drop('trip_order_details');
    }
}
