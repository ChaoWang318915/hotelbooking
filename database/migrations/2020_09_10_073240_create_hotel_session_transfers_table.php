<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelSessionTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_session_transfers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->BigInteger('HotelId');
            $table->date('Start');
            $table->date('End');
            $table->string('Type');
            $table->float('Adult');
            $table->float('Baby');
            $table->float('Child');
            $table->float('Teen');

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
        Schema::dropIfExists('hotel_session_transfers');
    }
}
