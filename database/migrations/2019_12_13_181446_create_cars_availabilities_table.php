<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsAvailabilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_availabilities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('date')->index();

            //            free or blocked or booked
            $table->integer('status')->unsigned()->nullable();

            $table->bigInteger('car_id')->unsigned()->index();

            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_availabilities');
    }
}
