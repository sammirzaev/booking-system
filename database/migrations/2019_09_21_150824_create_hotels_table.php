<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('star')->unique()->nullable();
            $table->decimal('price_from',10,2)->nullable();
            $table->decimal('price_to',10,2);
            $table->time('check_in')->nullable();
            $table->time('check_out')->nullable();
            $table->integer('status')->unsigned()->nullable();
            $table->integer('sort')->default(1)->unsigned();
            $table->integer('order_day')->nullable()->unsigned();
            $table->integer('cancel_day')->nullable()->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotels');
    }
}
