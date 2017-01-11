<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function($table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->integer('seat')->default(4); // Số ghế
            $table->tinyInteger('type')->default(1); // Loại xe: ngồi, giường nằm
            $table->string('image')->nullable();
            $table->integer('release_year')->default(0); // Năm ra mắt
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
        Schema::drop('cars');
    }
}
