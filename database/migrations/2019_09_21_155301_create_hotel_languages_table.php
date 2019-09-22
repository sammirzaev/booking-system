<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_languages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lang', 5);
            $table->string('title', 100);
            $table->string('address', 255);
            $table->decimal('latitude', 12,4)->nullable();
            $table->decimal('longitude', 12,4)->nullable();
            $table->text('description');
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
        Schema::create('hotel_languages', function (Blueprint $table) {
            $table->dropForeign(['hotel_id']);
        });
        Schema::dropIfExists('hotel_languages');
    }
}
