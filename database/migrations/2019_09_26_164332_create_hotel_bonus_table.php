<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelBonusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_bonus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('hotel_bonus_id')->unsigned()->index();
            $table->foreign('hotel_bonus_id')->references('id')->on('hotel_bonuses')->onDelete('cascade');
            $table->bigInteger('hotel_id')->unsigned()->index();
            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotel_bonus');
    }
}
