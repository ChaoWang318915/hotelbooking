<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIslandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('islands', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('island_name');
            $table->bigInteger('atoll_id');
            $table->string('length_width');
            $table->string('size');
            $table->string('distance_to_male');
            $table->string('island_usage');
            $table->string('population');
            $table->string('google_coordinates');
            $table->string('neighbouring_islands');
            $table->string('description');
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
        Schema::dropIfExists('islands');
    }
}
