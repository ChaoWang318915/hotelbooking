<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelSessionMealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels_session_meals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->BigInteger('HotelId');
            $table->date('Start');
            $table->date('End');
            $table->string('MealType1');
            $table->float('AdultValue1');
            $table->float('BabyValue1');
            $table->float('ChildValue1');
            $table->float('TeenValue1');

            $table->string('MealType2');
            $table->float('AdultValue2');
            $table->float('BabyValue2');
            $table->float('ChildValue2');
            $table->float('TeenValue2');

            $table->string('MealType3');
            $table->float('AdultValue3');
            $table->float('BabyValue3');
            $table->float('ChildValue3');
            $table->float('TeenValue3');

            $table->string('MealType4');
            $table->float('AdultValue4');
            $table->float('BabyValue4');
            $table->float('ChildValue4');
            $table->float('TeenValue4');

            $table->string('MealType5');
            $table->float('AdultValue5');
            $table->float('BabyValue5');
            $table->float('ChildValue5');
            $table->float('TeenValue5');

            $table->string('MealType6');
            $table->float('AdultValue6');
            $table->float('BabyValue6');
            $table->float('ChildValue6');
            $table->float('TeenValue6');

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
        Schema::dropIfExists('hotels_session_meals');
    }
}
