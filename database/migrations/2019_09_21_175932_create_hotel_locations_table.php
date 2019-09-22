<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('hotel_id')->unsigned()->index();
            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
            $table->bigInteger('location_id')->unsigned()->index();
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('hotel_locations', function (Blueprint $table) {
            $table->dropForeign(['hotel_id', 'location_id']);
        });
        Schema::dropIfExists('hotel_locations');
    }
}
