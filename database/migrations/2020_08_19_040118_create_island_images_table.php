<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIslandImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('island_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->BigInteger('island_id')->unsigned();
            $table->String('image_name',252);
            $table->foreign('island_id')->references('id')->on('islands')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('island_images');
    }
}
