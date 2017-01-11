<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function($table) {
            $table->bigIncrements('id');
            $table->string('route')->nullable();
            $table->integer('start_place')->default(0);
            $table->integer('end_place')->default(0);
            $table->string('start_address')->nullable();
            $table->string('end_address')->nullable();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->integer('price')->default(0);
            $table->integer('num_ticket')->default(0);
            $table->integer('transporter_id')->default(0);
            $table->integer('car_id')->default(0);
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
        Schema::drop('trips');
    }
}
