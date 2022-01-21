<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtollImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atoll_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->BigInteger('atoll_id')->unsigned();
            $table->String('image_name',252);
            $table->foreign('atoll_id')->references('id')->on('atolls')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('atoll_images');
    }
}
