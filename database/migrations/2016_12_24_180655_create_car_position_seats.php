<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarPositionSeats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_position_seats', function($table) {
            $table->bigIncrements('id');
            $table->bigInteger('car_id')->default(0);
            $table->tinyInteger('seat_type')->default(0);
            $table->tinyInteger('x')->default(0);
            $table->tinyInteger('y')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('car_position_seats');
    }
}
