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
        Schema::create('cars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->integer('type')->unsigned();
            $table->decimal('price',10,2);
            $table->integer('status')->unsigned()->nullable();
            $table->integer('sort')->default(1)->unsigned();
            $table->integer('adult_min')->default(1);
            $table->integer('adult_max')->default(1);
            $table->integer('bags')->default(1);
            $table->integer('doors')->default(1);
            $table->boolean('condition')->default(false);
            $table->string('img');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
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
        Schema::table('cars', function (Blueprint $table) {
            //
        });
    }
}
