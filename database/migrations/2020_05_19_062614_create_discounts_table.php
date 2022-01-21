<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('discount_type');
            $table->string('discount_name');
            $table->string('discount_code');
            $table->string('minimum_stay');
            $table->date('booking_period_from');
            $table->date('booking_period_to');
            $table->date('travel_period_from');
            $table->date('travel_period_to');
            $table->string('room_id');
            $table->string('reduction');
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
        Schema::dropIfExists('discounts');
    }
}
