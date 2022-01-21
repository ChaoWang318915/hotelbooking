<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('hotel_name');
            $table->bigInteger('island');
            $table->string('country');
             $table->string('streetno');
            $table->string('street');
            $table->string('zip');
            $table->string('city');
            $table->string('phone');
            $table->string('e-mail');
            $table->string('fax');
            $table->string('internet');
            $table->string('google_coordinates');
            $table->Integer('stars');
            $table->string('hotelcategory1');
            $table->string('hotelcategory2');
            $table->string('hotelcategory3');
            $table->Integer('number_rooms');
            $table->string('invoice_currency');
            $table->string('credit_cards');
            $table->string('minimum_stay');
            $table->string('board');
            $table->string('accessible');
            $table->string('wifi');
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
        Schema::dropIfExists('hotels');
    }
}
