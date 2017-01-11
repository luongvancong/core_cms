<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trip_orders', function($table) {
            $table->bigIncrements('id');
            $table->bigInteger('trip_id')->default(0);
            $table->bigInteger('customer_id')->default(0);
            $table->string('customer_name')->nullable();
            $table->string('customer_email')->nullable();
            $table->string('customer_phone')->nullable();
            $table->bigInteger('trip_schedule_id')->default(0);
            $table->string('picked_seat')->nullable();
            $table->integer('price')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('trip_orders');
    }
}
