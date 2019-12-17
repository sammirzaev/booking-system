<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_cars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('price');
            $table->integer('paid')->nullable();
            $table->integer('payment_type')->nullable();
            $table->timestamp('date_start')->nullable();
            $table->timestamp('date_end')->nullable();
            $table->integer('adults');
            $table->integer('status')->nullable();

            $table->bigInteger('car_id')->unsigned()->index();
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');

            $table->bigInteger('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('order_cars');
    }
}
