<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripOrderPickedSeat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trip_order_picked_seats', function($table) {
            $table->bigInteger('order_id')->default(0);
            $table->bigInteger('trip_id')->default(0);
            $table->tinyInteger('seat_position_x')->default(0);
            $table->tinyInteger('seat_position_y')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('trip_order_picked_seats');
    }
}
