<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('price',10,2)->nullable();

//            free booking or prepayment booking or all value pay
            $table->tinyInteger('booking_option')->nullable();

//            booking type % or fixed value
            $table->tinyInteger('payment_type')->nullable();

//            booking value
            $table->decimal('booking_value',10,2)->nullable();

//            cancel booking value
            $table->decimal('cancel_booking_value',10,2)->nullable();

//            discount value
            $table->decimal('discount_value',10,2)->nullable();

            $table->integer('sort')->default(1)->unsigned();

            $table->text('notes')->nullable();
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
        Schema::dropIfExists('rooms');
    }
}
