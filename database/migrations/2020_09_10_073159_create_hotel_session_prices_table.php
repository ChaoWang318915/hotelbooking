<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelSessionPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_session_prices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->BigInteger('HotelId');
            $table->Integer('RoomId');
            $table->BigInteger('SessionId');
            $table->float('PriceSingle');
            $table->float('PriceDoppel');
            $table->float('PriceTripple');
            $table->float('PriceRoom');
            $table->float('PriceExtraPax');
            $table->float('PriceKind1');
            $table->float('PriceKind2');
            $table->float('PriceKind3');
            $table->string('MainMeal');
            $table->float('ShowPricePerson');
            $table->Integer('ChildInc');
            $table->string('MealType1');
            $table->float('MealValue1');
            $table->string('MealType2');
            $table->float('MealValue2');
            $table->string('MealType3');
            $table->float('MealValue3');
            $table->string('MealType4');
            $table->float('MealValue4');
            $table->Integer('MinStay');
            $table->Integer('StornoType');
            $table->float('StornoValue');
            $table->string('RateCode');
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
        Schema::dropIfExists('hotel_session_prices');
    }
}
