<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingTextOnRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_text_on_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('hotel_id');
            $table->string('check_in')->nullable($value = true);
            $table->string('check_out')->nullable($value = true);
            $table->text('info_check_in')->nullable($value = true);
            $table->text('no_arrival_allowed_on')->nullable($value = true);
            $table->text('required_at_check-in')->nullable($value = true);
            $table->string('days_before_arrival')->nullable($value = true);
            $table->text('cancellation_policy')->nullable($value = true);
            $table->text('payment_information')->nullable($value = true);
            $table->text('price_information')->nullable($value = true);
            $table->text('information_booking')->nullable($value = true);
            $table->text('inclusive')->nullable($value = true);
            $table->text('costs_paid_site')->nullable($value = true);
            $table->text('hotel_policy')->nullable($value = true);
            $table->text('free_container')->nullable($value = true);
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
        Schema::dropIfExists('booking_text_on_requests');
    }
}
