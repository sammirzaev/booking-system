<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelBonusLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_bonus_languages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lang', 5);
            $table->string('title', 100);
            $table->bigInteger('hotel_bonus_id')->unsigned()->index();
            $table->foreign('hotel_bonus_id')->references('id')->on('hotel_bonuses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotel_bonus_languages');
    }
}
